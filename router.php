<?php
require_once 'libs/router.api.php';
require_once 'app/controller/games.api.controller.php';

//    TABLA DE RUTEO
//    URL           Verbo          Controller               Metodo
//    games         GET            ApiGamesController       getGames()
//    games/:ID     GET            ApiGamesController       getGame($id)
//    games         POST           ApiGamesController       addGames()
//    games/:ID     PUT            ApiGamesController       editGame($id)

$router = new Router();

#                 endpoint                  verbo      controller               metodo
$router->addRoute('games'      ,            'GET',     'GamesApiController',   'getGames');
$router->addRoute('games/:id'  ,            'GET',     'GamesApiController',   'getGameById');
$router->addRoute('games'  ,                'POST',    'GamesApiController',   'addGame');
$router->addRoute('games/:id'  ,            'PUT',     'GamesApiController',   'editGame');

$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
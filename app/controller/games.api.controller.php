<?php
require_once './app/view/json.view.php';
require_once './app/model/games.api.model.php';

class GamesApiController {
    private $view;
    private $model;
    public function __construct(){
        $this->view = new JSONView();
        $this->model = new GamesApiModel();
    }
    public function getGames($req, $res){
        $orderBy = false;
        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;

        $games = $this->model->getGames($orderBy);

        return $this->view->response($games);
    }
    public function getGameById($req, $res){
        $id = $req->params->id;
        $game = $this->model->getGameById($id);

        if (!$game){
            return $this->view->response("Error, el juego con el id $id no existe", 404);
        }
        
        return $this->view->response($game);
    }
    public function addGame($req, $res){
        if (empty($req->body->title) || empty($req->body->description) || empty($req->body->image) || empty($req->body->id_genre)){
            return $this->view->response("Error, falta completar datos", 404);
        }

        $title = $req->body->title;
        $description = $req->body->description;
        $image = $req->body->image;
        $id_genre = $req->body->id_genre;

        $id = $this->model->addGame($title, $description, $image, $id_genre);

        if (!$id) {
            return $this->view->response("Error al agregar juego", 500);
        }
        return $this->view->response("Juego agregado con exito", 201);
        $game = $this->model->getGameById($id);
        return $this->view->response($game, 201);
    }
    public function editGame($req, $res){
        $id = $req->params->id;
        $game = $this->model->getGameById($id);

        if (!$game){
            return $this->view->response("Error, el juego con el id $id no existe", 404);
        }
        if (empty($req->body->title) || empty($req->body->description) || empty($req->body->image)){
            return $this->view->response("Error, falta completar datos", 404);
        }

        $title = $req->body->title;
        $description = $req->body->description;
        $image = $req->body->image;

        $this->model->editGame($title, $description, $image, $id);

        $game = $this->model->getGameById($id);
        return $this->view->response($game, 201);
    }
}

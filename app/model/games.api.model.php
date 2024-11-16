<?php
class GamesApiModel{
    private $db;
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db-skibidigames;charset=utf8','root','');
    }
    public function getGames($orderBy = false){
        $sql = 'SELECT * FROM games';

        if($orderBy) {
            switch($orderBy) {
                case 'title':
                    $sql .= ' ORDER BY title';
                    break;
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $games = $query->fetchAll(PDO:: FETCH_OBJ);
        return $games;
    }
    public function getGameById($id){
        $query = $this->db->prepare ('SELECT * FROM games WHERE id = ?');
        $query->execute([$id]);
        $game = $query->fetch(PDO:: FETCH_OBJ);
        return $game;
    }
    public function addGame($title, $description, $image, $id_genre) { 
        $query = $this->db->prepare('INSERT INTO games(title, description, image, id_genre) VALUES (?, ?, ?, ?)');
        $query->execute([$title, $description, $image, $id_genre]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
    public function editGame($title, $description, $image, $id){
        $query = $this->db->prepare('UPDATE games SET title = ?,  description = ?, image = ? WHERE id = ?');
        $query->execute([$title, $description, $image, $id]);
    }
}

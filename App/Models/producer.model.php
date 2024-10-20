<?php

require_once './config/config.php';

class producerModel {

    private $db;

    public function __construct() {
        $this->db = new PDO(
                              "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", 
                               MYSQL_USER, MYSQL_PASS
        );
    }
    
    public function getProducers() {

        $query = $this->db->prepare('SELECT * FROM productoras');
        $query->execute();
        $producers = $query->fetchAll(PDO::FETCH_OBJ);

        return $producers;
    }
    public function getProducer($id) {
        $query = $this->db->prepare('SELECT * FROM productoras WHERE id_productora = ?');
        $query->execute([$id]);
        $producer = $query->fetch(PDO::FETCH_OBJ);


        return $producer;
    }
    public function getFilmsFromAProducers($id){
        $query = $this->db->prepare('SELECT * FROM peliculas WHERE id_productora = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}


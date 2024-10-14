<?php
class producerModel {

    private $db;

    public function __construct(){
        // Abro la base de datos.
        $this->db = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '');
    }
    public function getProducer() {

        $query = $this->db->prepare('SELECT * FROM productoras');
        $query->execute();
        $producer = $query->fetchAll(PDO::FETCH_OBJ);


        return $producer;
    }
}

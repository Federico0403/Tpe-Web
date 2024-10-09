<?php

class FilmsModel {
    private $db;

    public function __construct(){
        // Abro la base de datos.
        $this->db = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '');
    }
    
    public function getFilms() {
        // Ejecuto consulta sobre las peliculas.
        $query = $this->db->prepare('SELECT * FROM peliculas');
        // Guardo la consulta en $query y la ejecuto.
        $query->execute();

        // Con el fetchAll me traigo todos los datos, ya que el
        // SELECT * FROM peliculas trae la tabla completa.
        $films = $query->fetchAll(PDO::FETCH_OBJ);

        return $films;
    }
}
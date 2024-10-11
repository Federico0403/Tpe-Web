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

    public function insertFilm($name_film, $date, $director, $genre, $language) {
        $query = $this->db->prepare('INSERT INTO peliculas(Nombre_pelicula, Lanzamiento, director, genero, Idioma) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$name_film, $date, $director, $genre, $language]);

        // QUIZA DA ERROR PORQUE EN MI DB LA ID ES id_peliculas, CHEQUEAR UNA VEZ EN FUNCION

        $id_peliculas = $this->db->lastInsertId();

        return $id_peliculas;
    }

    public function cleanFilm($id_peliculas) {
        $query = $this->db->prepare('DELETE FROM peliculas WHERE id_peliculas = ?');
        $query->execute([$id_peliculas]);
    }

    public function updateFilm($id_peliculas, $name_film, $date, $director, $genre, $language) {
        // Actualizo los datos de la película en la base de datos
        $query = $this->db->prepare('UPDATE peliculas SET Nombre_pelicula = ?, Lanzamiento = ?, director = ?, genero = ?, Idioma = ? WHERE id_peliculas = ?');
        $query->execute([$name_film, $date, $director, $genre, $language, $id_peliculas]);
    }
    

}
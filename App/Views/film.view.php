<?php

class FilmsView {
    
    public function showFilms($films) {

        // La vista define una nueva variable con la cantidad de peliculas.
        $count = count($films);

        // Template accedera a todas las variables y constantes--
        // que tiene alcance esta funcion
        require 'Templates/list_films.phtml';
    }
}
<?php

class FilmsView {

    public function showFilms($films, $producers) {
        // La vista define una nueva variable con la cantidad de peliculas.
        $count = count($films);
        
        require 'Templates/list_films.phtml';
    }

    public function showError($error) {
        require 'Templates/error.phtml';
    }

    public function showHome($films) {
        require 'Templates/home_films.phtml';
    }
}

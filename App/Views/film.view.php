<?php

class FilmsView {

    public $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

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

    public function showEditFilmForm($film, $producers) {
        require 'Templates/form_edit_film.phtml';
    }

    public function showFilmDetails($film, $films) {
        require 'Templates/film_details.phtml';
    }
}

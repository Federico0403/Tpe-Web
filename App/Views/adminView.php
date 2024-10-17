<?php

class AdminView{

    public $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showFilms($films, $producers) {
        // La vista define una nueva variable con la cantidad de peliculas.
        $count = count($films);
        
        require 'Templates/Films/list_films.phtml';
    }
  
    public function showEditFilmForm($film, $producers) {
        require 'Templates/Films/form_edit_film.phtml';
    }

    public function addProducer($producers){
        require 'Templates/Producers/list_producer.phtml';
    }
    public function showAddProducer(){
        require 'Templates/Films/list_films.phtml';
    }
    public function seeForm($producer){
        require 'Templates/Producers/form_producers_edit.phtml';
    }

    public function showError($error) {
        require 'Templates/error.phtml';
    }
}
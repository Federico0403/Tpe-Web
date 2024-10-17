<?php
// Aqui las carpetas ajenas a esta, la cual usaremos sus archivos.
require_once './App/Models/film.model.php';
require_once './App/Views/film.view.php';
require_once './App/Models/producer.model.php';


class FilmsController {
    private $model;
    private $view;
    private $producerModel;


    // Constructor para inicializar el modelo y la vista
    public function __construct($res) {
        // Instancio el modelo de películas
        $this->model = new FilmsModel();

        // Instancio la vista de películas 
        $this->view = new FilmsView($res->user);

        // Instancio el modelo de productoras
        $this->producerModel = new producerModel(); 

    }
    
    public function showFilms() {
        $films = $this->model->getFilms();
        // Obtengo las productoras
        $producers = $this->producerModel->getProducers(); 
        // las paso a la vista
        return $this->view->showFilms($films, $producers); 
    }
    

    public function showHome() {
        $films = $this->model->getFilms();
       
        return $this->view->showHome($films);
    }





    public function showFilmDetails($id_peliculas) {
        // Obtengo la película específica por ID
        $film = $this->model->getFilmById($id_peliculas);
        
        // Obtengo todas las películas para mostrar debajo.
        $films = $this->model->getFilms();
    
        // Muestra la vista con los detalles de la película y la lista de otras películas
        $this->view->showFilmDetails($film, $films);
    }

    public function showError($error) {
        $this->view->showError($error);
    }
    
    
    
    
}
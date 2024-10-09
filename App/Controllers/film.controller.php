<?php
// Aqui las carpetas ajenas a esta, la cual usaremos sus archivos.
require_once './App/Models/film.model.php';
require_once './App/Views/film.view.php';

class FilmsController {
    private $model;
    private $view;

    // Constructor para inicializar el modelo y la vista
    public function __construct() {
        // Instancio el modelo de películas
        $this->model = new FilmsModel();

        // Instancio la vista de películas (asegúrate de que la clase exista)
        $this->view = new FilmsView();
    }

    public function showFilms() {

        $films = $this->model->getFilms();
        // Agrega esto para ver si se obtienen películas.
        return $this->view->showFilms($films);
    }
    
}
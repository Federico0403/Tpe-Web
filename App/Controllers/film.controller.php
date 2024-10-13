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

        // Instancio la vista de películas 
        $this->view = new FilmsView();
    }

    public function showFilms() {

        $films = $this->model->getFilms();
       
        return $this->view->showFilms($films);
    }

    public function addFilm() {
        if (!isset($_POST['name_film']) || empty($_POST['name_film'])){
            return $this->view->showError('Falta completar el nombre de la Pelicula');
        }
        if (!isset($_POST['date']) || empty($_POST['date'])){
            return $this->view->showError('Falta completar la fecha de estreno');
        }
        if (!isset($_POST['director']) || empty($_POST['director'])){
            return $this->view->showError('Falta completar el nombre del director');
        }
        if (!isset($_POST['genre']) || empty($_POST['genre'])){
            return $this->view->showError('Falta completar el genero de la pelicula');
        }
        if (!isset($_POST['language']) || empty($_POST['language'])){
            return $this->view->showError('Falta completar idioma de la pelicula');
        }

        $name_film = $_POST['name_film'];
        $date = $_POST['date'];
        $director = $_POST['director'];
        $genre = $_POST['genre'];
        $languague = $_POST['language'];

        $id_peliculas = $this->model->insertFilm($name_film, $date, $director, $genre, $languague);

        // Redirijo al home
        header('location: ' . BASE_URL);
    }

    public function deleteFilm($id_peliculas) {
        // Obtengo la pelicula especifica por id
        $films = $this->model->getFilms($id_peliculas);

        if(!$films) {
            return $this->view->showError("No existe la pelicula con el id = $id_peliculas");
        }

        // Borro y redirijo
        $this->model->cleanFilm($id_peliculas);

        header('Location: ' . BASE_URL);
    }

    public function editFilm($id_peliculas) {
        // Obtengo la película específica por id
        $films = $this->model->getFilms($id_peliculas);
    
        if (!$films) {
            return $this->view->showError("No existe película con el id = $id_peliculas");
        }
    
        // Compruebo si se envió el formulario de edición
        if (!isset($_POST['name_film']) || empty($_POST['name_film']) ||
            !isset($_POST['date']) || empty($_POST['date']) ||
            !isset($_POST['director']) || empty($_POST['director']) ||
            !isset($_POST['genre']) || empty($_POST['genre']) ||
            !isset($_POST['language']) || empty($_POST['language'])) {
    
            return $this->view->showError('Faltan completar campos obligatorios');
        }
    
        // Obtengo los datos del formulario
        $name_film = $_POST['name_film'];
        $date = $_POST['date'];
        $director = $_POST['director'];
        $genre = $_POST['genre'];
        $language = $_POST['language'];
    
        // Llamo al modelo para actualizar los datos
        $this->model->updateFilm($id_peliculas, $name_film, $date, $director, $genre, $language);
    
        // Redirijo al home
        header('Location: ' . BASE_URL);
    }
    
    
}
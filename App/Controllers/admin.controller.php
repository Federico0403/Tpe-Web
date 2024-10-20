<?php
// Aqui las carpetas ajenas a esta, la cual usaremos sus archivos.
require_once './App/Models/film.model.php';
require_once './App/Views/film.view.php';
require_once './App/Models/producer.model.php';
require_once './App/Views/producer.view.php';
require_once './App/Views/adminView.php';
require_once './App/Models/admin.model.php';
require_once './App/Views/producer.view.php';
require_once './App/Views/adminView.php';


class AdminController {
    private $model;
    private $view;



    public function __construct($res) {
        // Instancio el modelo de películas
        $this->model = new AdminModel();
    
        // Instancio la vista de películas 
        $this->view = new AdminView($res->user);

        

    }

    public function showFilms() {
        $films = $this->model->getFilms();
        // Obtengo las productoras
        $producers = $this->model->getProducers(); 
        // las paso a la vista
        return $this->view->showFilms($films, $producers); 
    }
    

    public function addFilm() {
        // Validación de campos obligatorios
        if (empty($_POST['name_film'])) {
            return $this->view->showError('Falta completar el nombre de la película');
        }
        if (empty($_POST['date'])) {
            return $this->view->showError('Falta completar la fecha de estreno');
        }
        if (empty($_POST['director'])) {
            return $this->view->showError('Falta completar el nombre del director');
        }
        if (empty($_POST['genre'])) {
            return $this->view->showError('Falta completar el género de la película');
        }
        if (empty($_POST['language'])) {
            return $this->view->showError('Falta completar el idioma de la película');
        }
        if (empty($_POST['id_productoras'])) {
            return $this->view->showError('Falta seleccionar una productora');
        }
        if(empty($_FILES['image_film']['type'] )) {
            return $this->view->showError('hubo un error con la imagen');
        }
        

        // Obtengo los datos del formulario
        $name_film = $_POST['name_film'];
        $date = $_POST['date'];
        $director = $_POST['director'];
        $genre = $_POST['genre'];
        $language = $_POST['language'];
        $id_productoras = $_POST['id_productoras']; 
    
        // Insento la pelicula
        $id_peliculas = $this->model->insertFilm($name_film, $date, $director, $genre, $language, $id_productoras, $_FILES['image_film']);

    
        // Verificar si la inserción fue exitosa
        if ($id_peliculas) {
            // Redirigir al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showError('Error al agregar la película. Por favor, inténtelo de nuevo.');
        }
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
        $film = $this->model->getFilmById($id_peliculas); // Usa getFilmById para obtener una película
    
        if (!$film) {
            return $this->view->showError("No existe la película con el id = $id_peliculas");
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validación de los campos del formulario
            if (empty($_POST['name_film'])) {
                return $this->view->showError('Falta completar el nombre de la película');
            }
            if (empty($_POST['date'])) {
                return $this->view->showError('Falta completar la fecha de estreno');
            }
            if (empty($_POST['director'])) {
                return $this->view->showError('Falta completar el nombre del director');
            }
            if (empty($_POST['genre'])) {
                return $this->view->showError('Falta completar el género de la película');
            }
            if (empty($_POST['language'])) {
                return $this->view->showError('Falta completar el idioma de la película');
            }
            if (empty($_POST['id_productora'])) {
                return $this->view->showError('Falta seleccionar una productora');
            }
            if(empty($_FILES['image_film']['type'] )) {
                return $this->view->showError('hubo un error con la imagen');
            }
    
            
    
            // Obtengo los datos del formulario
            $name_film = $_POST['name_film'];
            $date = $_POST['date'];
            $director = $_POST['director'];
            $genre = $_POST['genre'];
            $language = $_POST['language'];
            $id_productoras = $_POST['id_productora']; 
    
            // Llamo al modelo para actualizar los datos
            $this->model->updateFilm($id_peliculas, $name_film, $date, $director, $genre, $language, $id_productoras, $_FILES['image_film']);
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        }
    
        $producers = $this->model->getProducers(); 
        return $this->view->showEditFilmForm($film, $producers); 
    }

    public function addProducer() {
        $producers = $this->model->getProducers();
        $this->view->addProducer($producers);
    }


    public function addedProducer() {
        if (empty($_POST['input_name_producer'])) {
            return $this->view->showError('Falta completar el nombre de la productora');
        }
        if (empty($_POST['input_year_foundation'])) {
            return $this->view->showError('Falta completar el año de fundacion');
        }
        if (empty($_POST['founders'])) {
            return $this->view->showError('Falta completar el/los fundadores');
        }
        if (empty($_POST['country_origin'])) {
            return $this->view->showError('Falta completar el pais de origen');
        }
        if (empty($_FILES['image_producers']['type'])) {
            return $this->view->showError('Hubo un error con la imagen');
        }
    
        $name_producer = $_POST['input_name_producer'];
        $year_foundation = $_POST['input_year_foundation'];
        $founders = $_POST['founders'];
        $country_origin = $_POST['country_origin'];
    
        // Asegúrate de que aquí se use 'image_producers' y no 'image_film'
        $id_producer = $this->model->insertProducer($name_producer, $year_foundation, $founders, $country_origin, $_FILES['image_producers']);
    
        if ($id_producer) {
            header('Location: ' . BASE_URL . 'agregar');  
            exit(); 
        } else {
            return $this->view->showError('Error: no se pudo agregar la productora.');
        }
    }
    


    public function deleteProducer($id){

        $result = $this->model->deleteProducer($id);

        if ($result === true) {
            // Redireccionar si la eliminación fue exitosa
            header('Location: ' . BASE_URL . 'productora');
            exit();
        } elseif ($result === 'foreign_key_error') {
            // Mostrar un mensaje de error si la productora tiene películas asociadas
            $this->view->showError("No se puede eliminar la productora porque tiene películas asociadas.");
        } else {
            // Manejar otros errores inesperados
            $this->view->showError("Ocurrió un error inesperado al intentar eliminar la productora.");
        }

    }


    public function modifyProducers($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validación de los campos del formulario
            if (empty($_POST['input_name_producer']) || empty($_POST['input_year_foundation']) ||
                empty($_POST['founders']) || empty($_POST['country_origin'])) {
                return $this->view->showError('Todos los campos son requeridos.');
            }
    
            $name_producer = $_POST['input_name_producer'];
            $year_foundation = $_POST['input_year_foundation'];
            $founders = $_POST['founders'];
            $country_origin = $_POST['country_origin'];
    
            // Verifica si se subió una nueva imagen
            $image = $_FILES['image_producer'] ?? null; // Asegúrate de usar el nombre correcto aquí
    
            // Llama al modelo para modificar el productor
            $this->model->modifyProducer($name_producer, $year_foundation, $founders, $country_origin, $id, $image);
    
            header('Location: ' . BASE_URL . 'productora');
            exit();
        } else {
            // Si no es POST, es porque se quiere ver el formulario de edición
            $producer = $this->model->getProducer($id);
            if ($producer) {
                $this->view->seeForm($producer);
            } else {
                $this->view->showError('La productora no fue encontrada.');
            }
        }
    }
    
    
}
    
    
    

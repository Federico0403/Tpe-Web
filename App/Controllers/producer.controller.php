<?php
require_once './App/Models/producer.model.php';
require_once './App/Views/producer.view.php';
require_once './App/Views/film.view.php';
 class producerController {
    private $model;
    private $view;

    // Constructor 
    public function __construct() {
        // Instancio 
        $this->model = new producerModel();
        // Instancio 
        $this->view = new producerView();
    }
    public function showProducers() {

        $producers = $this->model->getProducers();
       
        return $this->view->showProducers($producers);
    }
    public function seeProducer($producer) {

        $producer = $this->model->getProducer($producer);
       // Verificar si la productora existe
        if ($producer) {
            return $this->view->seeProducer($producer);
        } else {
            return $this->view->showError('No se encontró ninguna productora con el ID ');
        }
    }
    public function addProducer() {
        $this->view->addProducer();
    }
    public function addedProducer(){
        if (empty($_POST['input_name_producer'])) {
            return $this->view->showError('Falta completar el nombre de la película');
        }
        if (empty($_POST['input_year_foundation'])) {
            return $this->view->showError('Falta completar la fecha de estreno');
        }
        if (empty($_POST['founders'])) {
            return $this->view->showError('Falta completar el nombre del director');
        }
        if (empty($_POST['country_origin'])) {
            return $this->view->showError('Falta completar el género de la película');
        }
       
        $name_producer = $_POST['input_name_producer'];
        $year_foundation = $_POST['input_year_foundation'];
        $founders= $_POST['founders'];
        $country_origin = $_POST['country_origin'];

        $this->model->insertProducer($name_producer, $year_foundation, $founders, $country_origin);

        $this->view->showAddFilms();
    

    }
    


}


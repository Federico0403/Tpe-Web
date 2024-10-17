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
    
    
    
    


}


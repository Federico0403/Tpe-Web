<?php
require_once './App/Models/producer.model.php';
require_once './App/Views/producer.view.php';
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
    public function showProducer() {

        $producer = $this->model->getProducer();
       
        return $this->view->showProducer($producer);
    }

}


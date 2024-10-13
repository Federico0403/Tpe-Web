<?php
 class producerController {
    private $model;
    private $view;

    // Constructor 
    public function __construct() {
        // Instancio 
        $this->model = new FilmsModel();
        // Instancio 
        $this->view = new FilmsView();
    }
    public function showProducer() {

        $producer = $this->model->getProducer();
       
        return $this->view->showProducer($producer);
    }

}


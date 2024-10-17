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
        $producers = $this->model->getProducers();
        $this->view->addProducer($producers);
    }
    public function addedProducer(){
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
       
        $name_producer = $_POST['input_name_producer'];
        $year_foundation = $_POST['input_year_foundation'];
        $founders= $_POST['founders'];
        $country_origin = $_POST['country_origin'];

        $id_producer = $this->model->insertProducer($name_producer, $year_foundation, $founders, $country_origin);

        if ($id_producer) {
            header('Location: ' . BASE_URL . 'agregar');  
            exit(); 
        } else {
           
            return $this->view->showError('Error: no se pudo agregar la productora.');
        }
    }
    public function deleteProducer($id){

        $this->model->deleteProducer($id);
        header('Location: ' . BASE_URL . 'productora');

    }
    public function modifyProducers($id){
            // Si la solicitud es POST, significa que el formulario fue enviado y es necesario procesar los datos
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validar que todos los campos obligatorios del formulario estén presentes
                if (empty($_POST['input_name_producer']) || empty($_POST['input_year_foundation']) ||
                    empty($_POST['founders']) || empty($_POST['country_origin'])) {
                    // Mostrar un mensaje de error si faltan campos
                    return $this->view->showError('Todos los campos son requeridos.');
                }
        
                // Obtener los datos del formulario
                $name_producer = $_POST['input_name_producer'];
                $year_foundation = $_POST['input_year_foundation'];
                $founders = $_POST['founders'];
                $country_origin = $_POST['country_origin'];
        
                // Actualizar la productora en la base de datos usando el modelo
                $this->model->modifyProducer($name_producer, $year_foundation, $founders, $country_origin, $id);
        
                // Redirigir al listado de productoras (u otra página) después de actualizar
                header('Location: ' . BASE_URL . 'productor');
                exit();
            } else {
                // Si la solicitud es GET, mostrar el formulario con los datos actuales de la productora para que se puedan editar
                $producer = $this->model->getProducer($id);  // Obtener la productora por ID desde el modelo
                if ($producer) {
                    // Mostrar el formulario de edición con los datos actuales de la productora
                    $this->view->seeForm($producer);
                } else {
                    // Mostrar un mensaje de error si la productora no existe
                    $this->view->showError('La productora no fue encontrada.');
                }
            }
    }
    


}


<?php
 class producerView {

    public $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showProducers($producers) {

        require 'Templates/Producers/home_producers.phtml';
    }
    public function seeProducer($producer){
        require 'Templates/Layout/header.phtml';
        require 'Templates/Producers/SeeProducer.phtml';
        require 'Templates/Layout/footer.phtml';
    }


    public function showError($error) {
        require 'Templates/error.phtml';
    }
    public function showDetails($films){
        require  'Templates/Producers/productoraDetails.phtml';  
    }

}

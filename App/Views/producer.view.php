<?php
 class producerView {
    public function showProducers($producers) {

        require 'Templates/home_producers.phtml';
    }
    public function seeProducer($producer){
        require 'Templates/SeeProducer.phtml';
    }
    public function addProducer($producers){
        require 'Templates/list_producer.phtml';
    }
    public function showAddProducer(){
        require 'Templates/list_films.phtml';
    }
}

<?php
 class producerView {
    public function showProducers($producers) {

        require 'Templates/Producers/home_producers.phtml';
    }
    public function seeProducer($producer){
        require 'Templates/Producers/SeeProducer.phtml';
    }
    public function addProducer($producers){
        require 'Templates/Producers/list_producer.phtml';
    }
    public function showAddProducer(){
        require 'Templates/Films/list_films.phtml';
    }
}

<?php
 class producerView {
    public function showProducers($producers) {

        require 'Templates/list_producers.phtml';
    }
    public function seeProducer($producer){
        require 'Templates/seeProducer.phtml';
    }
    public function addProducer(){
        require 'Templates/form_producer.phtml';
    }
}

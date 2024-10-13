<?php
 class producerView {
    public function showProducer($producer) {

        // La vista define una nueva variable con la cantidad de peliculas.
        $count = count($producer);

        require 'Templates/list_producer.phtml';
    }
}

<?php
class producerModel {

    private $db;

    public function __construct(){
        // Abro la base de datos.
        $this->db = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '');
    }
    public function getProducers() {

        $query = $this->db->prepare('SELECT * FROM productoras');
        $query->execute();
        $producers = $query->fetchAll(PDO::FETCH_OBJ);

        return $producers;
    }
    public function getProducer($id) {
        $query = $this->db->prepare('SELECT * FROM productoras WHERE id_productora = ?');
        $query->execute([$id]);
        $producer = $query->fetch(PDO::FETCH_OBJ);


        return $producer;
    }
    public function insertProducer($name_producer, $year_foundation, $founders, $country_origin){
        $query = $this->db->prepare('INSERT INTO productoras(nombre_productora,año_fundacion,fundador_es, pais_origen) VALUES (?,?,?,?)');
        $query->execute([$name_producer, $year_foundation, $founders, $country_origin]);
        $id_producer = $this->db->lastInsertId();

        return $id_producer;
    } 
    public function deleteProducer($id){
        try {
            $query = $this->db->prepare("DELETE FROM productoras WHERE id_productora = ?");
            $query->execute([$id]);
            return true; // Devuelve true si la eliminación fue exitosa
        } catch (PDOException $e) {
            // Si hay una violación de clave foránea, propagamos el error al controlador
            if ($e->getCode() == '23000') { 
                return 'foreign_key_error'; 
            } else {
                throw $e; 
            }
        }

    }
    public function modifyProducer($name_producer, $year_foundation, $founders, $country_origin, $id){
        $query = $this->db->prepare('UPDATE productoras SET nombre_productora = ?, año_fundacion = ?, fundador_es = ?, pais_origen = ? WHERE id_productora = ?');
        $query->execute([$name_producer, $year_foundation, $founders, $country_origin,$id]);
    }
}


<?php

class UserModel {
    private $db;

    public function __construct(){
        // Abro la base de datos.
        $this->db = new PDO('mysql:host=localhost;dbname=netflix;charset=utf8', 'root', '');
    }
 
    public function getUserByEmail($email) {    
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email = ?");
        $query->execute([$email]);
    
        $user = $query->fetch(PDO::FETCH_OBJ);
    
        return $user;
    }
}
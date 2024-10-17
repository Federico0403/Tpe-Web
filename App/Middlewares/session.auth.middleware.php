<?php
    function sessionAuthMiddleware($res) {
        session_start(); // Asegúrate de que session_start() se llame solo una vez en la aplicación
        if (isset($_SESSION['id_usuario'])) {
            $res->user = new stdClass();
            $res->user->id_usuario = $_SESSION['id_usuario'];
            $res->user->email = $_SESSION['email'];
        } else {
            header('Location: ' . BASE_URL . 'showLogin'); // Redirigir si no está logueado
            exit(); // Terminar el script después de la redirección
        }
    }
    
?>
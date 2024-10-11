<?php

require_once './App/Controllers/film.controller.php';

// base_url para direcciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'peliculas'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

// PD: Hagamos las url semanticas en Español, Asi queda mas lindo
// ej TPE-WEB/pelicuas

switch ($params[0]) {
    case 'peliculas':
        $controller = new FilmsController();
        $controller->showFilms();
        break;
    
    case 'nueva':
        $controller = new FilmsController();
        $controller->addFilm();
        break;
    
    case 'eliminar':
        $controller = new FilmsController();
        $controller->deleteFilm($params[1]);
        break;

    case 'editar':
        $controller = new FilmsController();
        $controller->editFilm($params[1]);
        break;

    default:
        echo "404 Page Not Found";
        break;
}
<?php

require_once 'App/Controllers/film.controller.php';

// base_url para direcciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
// para lo de loguearse
$res = new Response();

$action = 'peliculas'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

switch ($params[0]) {
    case 'peliculas':
        $controller = new FilmsController();
        $controller->showFilms();
        break;

    default:
        echo "404 Page Not Found";
        break;
}
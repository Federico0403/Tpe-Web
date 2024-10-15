<?php

require_once './Libs/response.php';
require_once './App/Middlewares/session.auth.middleware.php';
require_once './App/Controllers/film.controller.php';
require_once './App/Controllers/producer.controller.php';
require_once './App/Controllers/auth.controller.php';

// base_url para direcciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res = new Response();

$action = 'inicio'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

// PD: Hagamos las url semanticas en Español, Asi queda mas lindo
// ej TPE-WEB/pelicuas

switch ($params[0]) {
    case 'inicio':
        sessionAuthMiddleware($res);
        $controller = new FilmsController($res);
        $controller->showHome();
        break;

    case 'agregar':
        sessionAuthMiddleware($res);
        $controller = new FilmsController($res);
        $controller->showFilms();
        break;
    
    case 'nueva':
        sessionAuthMiddleware($res);
        $controller = new FilmsController($res);
        $controller->addFilm();
        break;
    
    case 'eliminar':
        sessionAuthMiddleware($res);
        $controller = new FilmsController($res);
        $controller->deleteFilm($params[1]);
        break;

    case 'editar':
        sessionAuthMiddleware($res);
        $controller = new FilmsController($res);
        $controller->editFilm($params[1]);
        break;
        
    // Nuevo caso para mostrar detalles de la película
    case 'film':
        $controller = new FilmsController($res);
        $controller->showFilmDetails($params[1]); // Llamamos al nuevo método
        break;
    
    case 'productor':
        $controller = new producerController();
        $controller->showProducer();
        break;
    
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    
    default:
        echo "404 Page Not Found";
        break;
}

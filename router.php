<?php

require_once './Libs/response.php';
require_once './App/Middlewares/session.auth.middleware.php';
require_once './App/Controllers/film.controller.php';
require_once './App/Controllers/producer.controller.php';
require_once './App/Controllers/auth.controller.php';
require_once './App/Controllers/admin.controller.php';
require_once './App/Middlewares/verify.auth.middleware.php';

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
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->showFilms();
        break;
    case 'nueva':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->addFilm();
        break;
    case 'eliminar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->deleteFilm($params[1]);
        break;
    case 'editar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->editFilm($params[1]);
        break;
   // Nuevo caso para mostrar detalles de la película
    case 'pelicula':
        sessionAuthMiddleware($res);
        $controller = new FilmsController($res);
        $controller->showFilmDetails($params[1]); // Llamamos al nuevo método
        break;
    case 'productora':
        sessionAuthMiddleware($res);
        $controller = new producerController($res);
        $controller->showProducers();
        break;
    case 'verProductora':
        sessionAuthMiddleware($res);
        $controller = new producerController();
        $controller->seeProducer($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'agregarProductora':
        sessionAuthMiddleware($res);
        var_dump($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->addProducer();
        break;
    case 'productoraAgregada':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->addedProducer();
        break;
    case 'eliminarProductora':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->deleteProducer($params[1]);
        break;
    case 'editarProductora':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); 
        $controller = new AdminController($res);
        $controller->modifyProducers($params[1]);
        break;
    case 'verDetalle':
        $controller = new producerController($res);
        $controller->seeDetail($params[1]);
        break;
    default:
        echo "404 Page Not Found";
        break;
}

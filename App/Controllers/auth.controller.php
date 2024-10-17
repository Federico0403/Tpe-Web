<?php
require_once './App/Models/user.model.php';
require_once './App/Views/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            return $this->view->showLogin('Falta completar el mail del usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUserByEmail($email);

        if ($userFromDB && password_verify($password, $userFromDB->password)) {
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['id_usuario'] = $userFromDB->id;
            $_SESSION['email'] = $userFromDB->email;
    
            // Redirijo al home
            header('Location: ' . BASE_URL . 'productor');
        } else {
            return $this->view->showError('credenciales incorrectas');
        }
        
    }

    

}


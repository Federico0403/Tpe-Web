<?php

class AuthView {
    private $user = null;

    public function showLogin($error = '') {
        require 'Templates/form_login.phtml';
    }

}
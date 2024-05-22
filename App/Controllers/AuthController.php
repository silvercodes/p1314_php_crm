<?php

namespace App\Controllers;

class AuthController
{
    public function renderRegistration() {

        require_once ROOT . '/App/views/auth/RegistrationView.php';

    }

    public function registration() {
        dd($_POST);
    }
}
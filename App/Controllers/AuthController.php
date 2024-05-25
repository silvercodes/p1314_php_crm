<?php

namespace App\Controllers;

use Core\Tools;

class AuthController
{
    private function checkFields(array $fields) {
        $errors = [];

        foreach($fields as $key => $value)
            if (empty($value))
                $errors[] = ucfirst($key) . ' is required';

        return $errors;
    }
    public function renderRegistration() {

        require_once ROOT . '/App/views/auth/RegistrationView.php';

    }

    public function registration() {
        $data = $_POST;

        $errors = $this->checkFields($data);

        if ($errors)
            foreach ($errors as $error)
                Tools::notify($error, 'red');
        else {






            
        }
    }
}
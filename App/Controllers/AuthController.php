<?php

namespace App\Controllers;

use App\Models\User;
use Core\CookieManager;
use Core\Tools;

class AuthController
{
    private function checkFields(array $fields)
    {
        $errors = [];

        foreach ($fields as $key => $value) {
            if (empty($value)) {
                $errors[] = ucfirst($key) . ' is required';
            }
        }

        return $errors;
    }
    private function generateToken(): string
    {
        return bin2hex(random_bytes(TOKEN_LENGTH));
    }

    public function renderRegistration()
    {
        require_once ROOT . '/App/views/auth/RegistrationView.php';
    }

    public function registration()
    {
        $data = $_POST;

        $errors = $this->checkFields($data);

        if ($errors) {
            foreach ($errors as $error) {
                Tools::notify($error, 'red');
            }
        } else {
            $user = User::findOne([
                'email' => $data['email']
            ]);

            if (!$user) {
                $data['password'] = md5($data['password']);

                $user = User::create($data);
                $user->role = 'admin';

                $user->save();

                header('Location: /login');

                return;
            }

            Tools::notify("$user->email is taken...", 'red');
        }
    }

    public function renderLogin()
    {
        require_once ROOT . '/App/views/auth/LoginView.php';
    }

    public function login()
    {
        $data = $_POST;

        $errors = $this->checkFields($data);

        if ($errors) {
            foreach ($errors as $error) {
                Tools::notify($error, 'red');
            }
        } else {
            $user = User::findOne([
                'email' => $data['email']
            ]);

            if (! $user || $user->password !== md5($data['password'])) {
                Tools::notify("Email or password is invalid...", 'red');

                return;
            }

            $user->token = $this->generateToken();

            $user->update();

            CookieManager::setUserCookie([
                COOKIE_TOKEN_KEY => $user->token,
            ]);

            header('Location: ' . HOME_PAGE);
        }
    }

    public function logout()
    {
        CookieManager::clearCookie([COOKIE_TOKEN_KEY]);
        header('Location: /login');
    }
}
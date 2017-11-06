<?php

namespace App\Validators;

use Nick\Framework\Session;

class LoginValidator
{
    public function validate()
    {
        $errors = [];

        if (empty($_POST['username'])) { // Als username niet is ingevuld.
            $errors['usernameError'] = 'Please make sure to enter a username.';
        }

        if (empty($_POST['password'])) { // Als password niet is ingevuld.
            $errors['passwordError'] = 'Please make sure to enter a password.';
        }

        Session::setFlash('validationErrors', $errors);

        if (!empty($errors)) {
            return redirect('login');
        }
    }
}
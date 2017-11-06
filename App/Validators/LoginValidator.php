<?php

namespace App\Validators;

use Nick\Framework\Cookies;
use Nick\Framework\Session;

class LoginValidator
{
    public function validate()
    {
        $errors = [];

        if (empty($_POST['username'])) { // Als username niet is ingevuld.
            $errors['username'] = 'Please make sure to enter a username.';
        }

        if (empty($_POST['password'])) { // Als password niet is ingevuld.
            $errors['password'] = 'Please make sure to enter a password.';
        }

        Session::setFlash('loginErrors', $errors);

        return $errors;
    }

    public function validateUser($user)
    {
        if ($user === null) {
            $error = 'The combination of username and password is not valid.';

            Session::setFlash('loginFailedError', $error);

            return false;
        } else {
            Cookies::make('userId', $user->id, 3600);

            return true;
        }
    }
}
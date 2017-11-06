<?php

namespace App\Controllers;

use App\Services\AuthenticationService;
use Nick\Framework\App;

class LoginController
{
    public function login()
    {
        if (!empty(App::get('loginValidator')->validate())) {
                return redirect('login');
        }

        $user = App::get('userRepository')->getUserByLogin($_POST['username'], $_POST['password']);

        if (App::get('loginValidator')->validateUser($user))
        {
            App::get('authenticationService')->login($user);

            return redirect('');
        } else {
            return redirect('login');
        }

    }

    public function logout()
    {
        App::get('authenticationService')->logout();
        return redirect('');
    }

    public function githubLogin()
    {
        App::get('authenticationService')->githubLogin();

        redirect('');
    }

    public function googleLogin()
    {

    }
}
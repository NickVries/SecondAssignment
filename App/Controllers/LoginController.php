<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use Nick\Framework\App;
use Nick\Framework\Session;

class LoginController
{
    public function login()
    {
        App::get('loginValidator')->validate();

        $user = App::get('userRepository')->getUserByUsername($_POST['username']);

        App::get('authenticationService')->login($user->id);

        redirect('');
    }

    public function logout()
    {
        App::get('authenticationService')->logout();
        return redirect('');
    }
}
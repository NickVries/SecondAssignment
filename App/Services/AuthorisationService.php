<?php

namespace App\Services;

use Nick\Framework\App;
use Nick\Framework\Session;

class AuthorisationService
{
    public function login($id)
    {
        $user = App::get('userRepository')->getUser($id);

        Session::store('authenticatedUser', $user);
    }

    public function authenticatedUser()
    {
        return Session::get('authenticatedUser');
    }
}
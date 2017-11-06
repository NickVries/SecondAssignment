<?php

namespace App\Services;

use Nick\Framework\App;
use Nick\Framework\Cookies;
use Nick\Framework\Session;

class AuthenticationService
{
    public function login($id)
    {
        $user = App::get('userRepository')->getUserById($id);

        Session::store('authenticatedUser', $user);
    }

    public function authenticatedUser()
    {
        return Session::get('authenticatedUser');
    }

    public function register()
    {

    }

    public function logout()
    {
        Cookies::eat('authenticatedUser');
        Session::remove('authenticatedUser');
    }

    public function checkLogin()
    {
        if (!empty(Session::get('authenticatedUser'))) {
            return true;
        }

        return false;
    }
}
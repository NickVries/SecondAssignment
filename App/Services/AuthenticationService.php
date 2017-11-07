<?php

namespace App\Services;

use App\Clients\GoogleClient;
use GuzzleHttp\Client;
use Nick\Framework\App;
use Nick\Framework\Cookies;
use Nick\Framework\Helpers;
use Nick\Framework\Session;

class AuthenticationService
{
    public function login($user)
    {
        Session::store('authenticatedUser', $user);
    }

    public function authenticatedUser()
    {
        return Session::get('authenticatedUser');
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

    public function githubLogin()
    {
        App::get('githubClient')->githubLogin();

        $user = App::get('githubClient')->getAuthenticatedUser();

        Session::store('authenticatedUser', $user);
    }

    public function googleLogin()
    {
        App::get('googleClient')->googleLogin();
    }

    public function googleCallback()
    {
        App::get('googleClient')->googleCallback();
    }

    public function getGoogleUser()
    {
        $user = App::get('googleClient')->getGoogleUser();

        Session::store('authenticatedUser', $user);
    }
}
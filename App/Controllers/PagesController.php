<?php

namespace App\Controllers;

use App\Services\AuthenticationService;
use Nick\Framework\App;
use Nick\Framework\Request;
use Nick\Framework\Session;

class PagesController
{
    public function home()
    {
        $currentUser = App::get('authenticationService')->authenticatedUser();

        return view('index', compact('currentUser'));
    }

    public function page404()
    {
        $baseUrl = Request::baseUrl();

        return view('404', compact('baseUrl'));
    }

    public function login()
    {
        if (App::get('authenticationService')->checklogin()) {
            return redirect('');
        }

        $loginErrors = Session::getFlash('loginErrors');

        return view('login', compact('loginErrors'));
    }

    public function register()
    {
        $errors = Session::getFlash('registrationErrors');
        $duplicateError = Session::getFlash('duplicateUsername');
        $name = $_GET['name'] ?? '';

        return view('register', compact('errors', 'name', 'duplicateError'));
    }
}
<?php

namespace App\Controllers;

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
        $loginFailedError = Session::getFlash('loginFailedError');

        return view('login', compact('loginErrors', 'loginFailedError'));
    }

    public function register()
    {
        $registrationErrors = Session::getFlash('registrationErrors');
        $duplicateError = Session::getFlash('duplicateUsername');
        $name = $_GET['name'] ?? '';

        return view('register', compact('registrationErrors', 'name', 'duplicateError'));
    }
}
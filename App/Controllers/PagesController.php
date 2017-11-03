<?php

namespace App\Controllers;

use App\Services\AuthorisationService;
use Nick\Framework\App;
use Nick\Framework\Request;
use Nick\Framework\Session;

class PagesController
{
    public function home()
    {
        $currentUser = App::get('authorisationService')->authenticatedUser();

        return view('index', compact('currentUser'));
    }

    public function page404()
    {
        $baseUrl = Request::baseUrl();

        return view('404', compact('baseUrl'));
    }

    public function login()
    {
        if (App::get('authorisationService')->authenticatedUser()) {
            redirect('');
        }
        return view('login');
    }

    public function register()
    {
        $errors = Session::getFlash('registrationErrors');
        $duplicateError = Session::getFlash('duplicateUsername');
        $name = $_GET['name'] ?? '';

        return view('register', compact('errors', 'name', 'duplicateError'));
    }
}
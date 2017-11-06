<?php

namespace App\Controllers;

use Nick\Framework\App;
use Nick\Framework\Session;

class UsersController
{
    public function store()
    {
        App::get('registrationValidator')->validate();

        $id = App::get('userRepository')->create($_POST['name'], $_POST['username'], $_POST['password']);

        App::get('authenticationService')->login($id);

        return redirect('');
    }
}
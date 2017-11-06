<?php

namespace App\Controllers;

use Nick\Framework\App;

class UsersController
{
    public function store()
    {
        App::get('registrationValidator')->validate();

        $id = App::get('userRepository')->create($_POST['name'], $_POST['username'], $_POST['password']);

        $user = App::get('userRepository')->getUserById($id);

        App::get('authenticationService')->login($user);

        return redirect('');
    }
}
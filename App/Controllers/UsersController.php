<?php

namespace App\Controllers;

use Nick\Framework\App;
use Nick\Framework\Session;

class UsersController
{
    public function store()
    {
        App::get('registrationValidator')->validate();

        $id = App::get('userRepository')
            ->create($_POST['name'], $_POST['username'], $_POST['password']);

        if ($id === null) {
            Session::setFlash('duplicateUsername',
                'This username is already taken.');

            redirect("register?name={$_POST['name']}");
        }

        $user = App::get('userRepository')->getUserById($id);

        App::get('authenticationService')->login($user);

        return redirect('');
    }
}
<?php

namespace App\Repositories;

use App\InsertDuplicateException;
use App\User;
use Nick\Framework\App;
use Nick\Framework\Session;

class UserRepository
{
    protected $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function create($name, $username, $password)
    {
        $userData = [
            'name' => $name,
            'username' => $username,
            'password' => $password,
        ];

        try {
            $userId = $this->database->insertInto('users', $userData);
        } catch (InsertDuplicateException $e) {
            Session::setFlash('duplicateUsername', 'This username is already taken.');
            return redirect("register?name={$name}");
        }

        return $userId;
    }

    public function getUser($id)
    {
        return App::get('database')
            ->select('name', 'id')
            ->from('users')
            ->where('id', '=', $id)
            ->stopHetInMij(User::class)
            ->first();
    }
}
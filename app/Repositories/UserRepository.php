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

    public function create(
        $name,
        $username = null,
        $password = null,
        $google_id = null,
        $github_id = null
    ) {
        $userData = [
            'name'     => $name,
            'username' => $username,
            'password' => $password,
            'google_id' => $google_id,
            'github_id' => $github_id,
        ];

        try {
            $userId = $this->database->insertInto('users', $userData);
        } catch (InsertDuplicateException $e) {
            return null;
        }

        return $userId;
    }

    public function getUser($assocArray)
    {
        $query = App::get('database')
            ->select('id', 'name', 'google_id', 'github_id')
            ->from('users')
            ->stopHetInMij(User::class);

        foreach ($assocArray as $key => $value) {
            $query->where($key, '=', $value);
        }
        return $query->first();
    }

    public function getUserById($id)
    {
        return $this->getUser(['id' => $id]);
    }

    public function getUserByLogin($username, $password)
    {
        return $this->getUser(['username' => $username, 'password' => $password]);
    }

    public function update($column, $value, $assoc)
    {
        $query = App::get('database')
            ->updateTable('users')
            ->set($column, $value);

        foreach ($assoc as $key => $value) {
            $query->where($key, '=', $value);
        }

        $query->update();
    }
}

<?php

namespace App\Services;

use Nick\Framework\App;
use Nick\Framework\Cookies;
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

        if ($this->checkLogin()) {
            $currentUser = $this->authenticatedUser();

            App::get('userRepository')
                ->update('github_id', $user->github_id, ['id' => $currentUser->id]);

            $currentUser->github_id = $user->github_id;

            $this->login($currentUser);

            return null;
        }

        $userId = App::get('userRepository')->getUser(['github_id' => $user->github_id]);

        if ($userId === null) {
            $userId = App::get('userRepository')
                ->create($user->name, $user->username, null, null, $user->github_id);
        }

        if ($userId === null) {
            $userId = App::get('userRepository')
                ->update('github_id', $user->github_id, ['username' => $user->username]);
        }

        $user->id = $userId;

        $this->login($user);
    }

    public function googleLogin()
    {
        App::get('googleClient')->googleLogin();
    }

    public function googleCallback()
    {
        App::get('googleClient')->googleCallback();

        $user = App::get('googleClient')->getAuthenticatedUser();

        if ($this->checkLogin()) {
            $currentUser = $this->authenticatedUser();

            App::get('userRepository')
                ->update('google_id', $user->google_id, ['id' => $currentUser->id]);

            $currentUser->google_id = $user->google_id;

            $this->login($currentUser);

            return null;
        }

        $userId = App::get('userRepository')->getUser(['google_id' => $user->google_id]);

        if ($userId === null) {
            $userId = App::get('userRepository')
                ->create($user->name, $user->username, null, $user->google_id);
        }

        if ($userId === null) {
            $userId = App::get('userRepository')
                ->update('google_id', $user->google_id, ['username' => $user->username]);
        }

        $user->id = $userId;

        $this->login($user);
    }
}

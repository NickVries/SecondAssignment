<?php

namespace App\Clients;

use App\User;
use GuzzleHttp\Client;
use Nick\Framework\Helpers;
use Nick\Framework\Session;

class GoogleClient
{
    public function googleLogin()
    {

        $client = new \Google_Client();
        $client->setAuthConfig(Helpers::root().'App/clientSecret.json');
        $client->addScope(\Google_Service_Plus::USERINFO_PROFILE);
        $client->setRedirectUri('http://localhost:8888/google-callback');
        $client->setIncludeGrantedScopes(true);

        $auth_url = $client->createAuthUrl();

        header('Location: '.filter_var($auth_url, FILTER_SANITIZE_URL));
    }

    public function googleCallback()
    {
        $client = new \Google_Client();
        $client->setAuthConfig(Helpers::root().'App/clientSecret.json');
        $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $accessToken = $client->getAccessToken();

        Session::store('googleAccessToken', $accessToken);
    }

    public function getAuthenticatedUser()
    {
        $client = new \Google_Client();
        $client->setAuthConfig(Helpers::root().'App/clientSecret.json');
        $client->setAccessToken(Session::get('googleAccessToken'));

        $plus = new \Google_Service_Plus($client);
        $me = $plus->people->get('me');

        $user = new User();
        $user->name = $me->getDisplayName();
        $user->google_id = $me->getId();
        $user->avatar = $me->getImage()->getUrl();
        $user->username = $me->getEmails()[0]->getValue();

        return $user;
    }
}

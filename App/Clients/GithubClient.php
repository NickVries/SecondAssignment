<?php

namespace App\Clients;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Nick\Framework\Session;

class GithubClient
{
    public function githubLogin()
    {
        $client = new Client([
            'base_uri' => 'https://github.com',
        ]);

        $response = $client->request('POST',
            'login/oauth/access_token', [
                RequestOptions::FORM_PARAMS => [
                    'client_id'     => 'd77abb39c2b95aa9efb7',
                    'client_secret' => 'cdd81aee1063c06f9583fcbc64218ea6e72a6db1',
                    'code'          => $_GET['code'],
                ],
                RequestOptions::HEADERS     => [
                    'Accept' => 'application/json',
                ],
            ]);

        $jsonBody = $response->getBody();

        $phpBody = \GuzzleHttp\json_decode($jsonBody);

        $accessToken = $phpBody->access_token;

        Session::store('accessToken', $accessToken);
    }

    public function getAuthenticatedUser()
    {
        $accessToken = Session::get('accessToken');

        $client = new Client([
            'base_uri' => 'https://api.github.com',
        ]);

        $response = $client->request('GET', 'user', [
            RequestOptions::HEADERS => [
                'Authorization' => "token {$accessToken}",
            ],
        ]);

        $body = (string)$response->getBody();

        $githubUser = \GuzzleHttp\json_decode($body);

        $user = new User();

        $user->id = $githubUser->id;
        $user->name = $githubUser->name;

        return $user;
    }
}
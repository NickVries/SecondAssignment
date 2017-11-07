<?php

namespace App\Providers;

use App\Clients\GithubClient;
use App\Clients\GoogleClient;
use App\Repositories\UserRepository;
use App\Services\AuthenticationService;
use App\Validators\LoginValidator;
use App\Validators\RegistrationValidator;
use Nick\Framework\App;
use Nick\Framework\Contracts\ServiceProviderInterface;
use Nick\Framework\Database\Connector;
use Nick\Framework\Database\QueryBuilder;
use Nick\Framework\Helpers;
use Nick\Framework\Router;

class AppServiceProvider implements ServiceProviderInterface
{
    public function register()
    {
        App::bind('config', require Helpers::root().'config.php');

        App::bind('database', function() {
            return new QueryBuilder(Connector::make(App::get('config')['database']));
        });

        $routes = Helpers::root().'app/routes.php';
        App::bind('router', Router::load($routes));

        App::bind('userRepository', function() {
            return new UserRepository(App::get('database'));
        });

        App::bind('authenticationService', function() {
            return new AuthenticationService();
        });

        App::bind('registrationValidator', function() {
            return new RegistrationValidator();
        });

        App::bind('loginValidator', function() {
            return new LoginValidator();
        });

        App::bind('githubClient', function() {
            return new githubClient();
        });

        App::bind('googleClient', function() {
            return new googleClient();
        });
    }
}

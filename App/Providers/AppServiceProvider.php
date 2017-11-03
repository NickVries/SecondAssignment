<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Services\AuthorisationService;
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

        App::bind('authorisationService', function() {
            return new AuthorisationService();
        });
    }
}
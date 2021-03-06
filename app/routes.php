<?php

use App\Controllers\LoginController;
use App\Controllers\PagesController;
use App\Controllers\UsersController;

$router->get('', PagesController::class . '@home');
$router->get('404', PagesController::class . '@page404');
$router->get('login', PagesController::class . '@login');
$router->get('register', PagesController::class . '@register');
$router->get('logout', LoginController::class . '@logout');
$router->get('callback', LoginController::class . '@githubLogin');
$router->get('google-login', LoginController::class . '@googleLogin');
$router->get('google-callback', LoginController::class . '@googleCallback');
$router->get('my-account', PagesController::class . '@myAccount');

$router->post('register', UsersController::class . '@store');
$router->post('login', LoginController::class . '@login');

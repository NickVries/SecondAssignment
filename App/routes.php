<?php

use App\Controllers\PagesController;

$router->get('', PagesController::class . '@home');

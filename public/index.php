<?php

use Nick\Framework\App;
use Nick\Framework\Helpers;
use Nick\Framework\Request;

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

require Helpers::root() . '/core/bootstrap.php';

App::get('router')
    ->direct(Request::uri(), Request::method());

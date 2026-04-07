<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../src/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../src/vendor/autoload.php';

(require_once __DIR__.'/../src/bootstrap/app.php')
    ->handleRequest(Request::capture());

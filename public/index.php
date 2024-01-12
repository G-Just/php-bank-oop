<?php

session_start();

use App\Core\Router;

require __DIR__ . '/../vendor/autoload.php';
define('ROOT', __DIR__ . '/../');
define('URL', __DIR__ . 'http://localhost/BIT/php-u3/public');

echo Router::route();

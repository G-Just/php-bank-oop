<?php

session_start();

use App\Core\Router;

require __DIR__ . '/../vendor/autoload.php';
define('ROOT', __DIR__ . '/../');
define('URL', 'http://phpbank.local/');

echo Router::route();

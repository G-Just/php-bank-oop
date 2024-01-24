<?php

session_start();

use App\Core\Router;

require __DIR__ . '/../vendor/autoload.php';
define('ROOT', __DIR__ . '/../');
define('URL', 'http://bank.local/');

echo Router::route();


// TODO: Do the database user portion, so that the users are pulled from the database and not the file
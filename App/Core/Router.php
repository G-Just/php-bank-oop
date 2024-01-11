<?php

namespace App\Core;

use App\Controllers\CreateAccountController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;

class Router
{
    public static function route()
    {
        $url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
        array_shift($url);
        return match ($url[0]) {
            '', 'home' => (new HomeController)->index(),
            'newAccount' => (new CreateAccountController)->index(),
            'login' => (new LoginController)->index(),
            'register' => (new RegisterController)->index(),
            default => '<h1>404 Page not found</h1>'
        };
    }
}

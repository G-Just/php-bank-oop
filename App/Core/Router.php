<?php

namespace App\Core;

use App\Controllers\CreateAccountController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\UserListController;

class Router
{
    public static function route()
    {
        $url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
        array_shift($url);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return match ($url[0]) {
                '', 'home' => (new HomeController)->index(),
                'new' => (new CreateAccountController)->index(),
                'login' => (new LoginController)->index(),
                'register' => (new RegisterController)->index(),
                'users' => (new UserListController)->index(),
                default => '<h1>404 Page not found</h1>'
            };
        } else {
            return match ($url[0]) {
                'new' => (new CreateAccountController)->handlePost(),
                'login' => (new LoginController)->handlePost(),
                'register' => (new RegisterController)->handlePost(),
                default => '<h1>404 Page not found</h1>'
            };
        }
    }
}

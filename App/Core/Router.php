<?php

namespace App\Core;

use App\Controllers\CreateAccountController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\UserListController;
use App\Controllers\SignOutController;

class Router
{
    public static function route()
    {
        $url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
        array_shift($url);
        $controller = $url[0];
        $method = $url[1] ?? 'index';
        $params = $url[2] ?? [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return match ($controller) {
                '', 'home' => (new HomeController)->$method(),
                'new' => (new CreateAccountController)->$method(),
                'login' => (new LoginController)->$method(),
                'register' => (new RegisterController)->$method(),
                'logout' => (new SignOutController)->$method(),
                'users' => (new UserListController)->$method(),
                default => '<h1>404 Page not found</h1>'
            };
        } else {
            $method = $url[1] ?? 'handlePost';
            return match ($controller) {
                'new' => (new CreateAccountController)->$method(),
                'login' => (new LoginController)->$method(),
                'register' => (new RegisterController)->$method(),
                default => '<h1>404 Page not found</h1>'
            };
        }
    }
}

<?php

namespace App\Core;

use App\Controllers\_404Controller;
use App\Controllers\AccountController;
use App\Controllers\CreateAccountController;
use App\Controllers\DBChangeController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\UserListController;
use App\Controllers\SignOutController;

class Router
{
    public static function route()
    {
        isset($_SESSION['db']) ? '' : $_SESSION['db'] = 'file';
        $url = explode('/', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
        array_shift($url);
        $controller = $url[0];
        $method = $url[1] ?? 'index';
        $params = array_slice($url, 2) ?? [];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return match ($controller) {
                '', 'home' => (new HomeController)->$method(...$params),
                'new' => (new CreateAccountController)->$method(...$params),
                'login' => (new LoginController)->$method(...$params),
                'register' => (new RegisterController)->$method(...$params),
                'logout' => (new SignOutController)->$method(...$params),
                'users' => (new UserListController)->$method(...$params),
                'account' => (new AccountController)->$method(...$params),
                default => (new _404Controller)->$method(...$params)
            };
        } else {
            $method = $url[1] ?? 'handlePost';
            return match ($controller) {
                '', 'home' => (new DBChangeController)->$method(...$params),
                'new' => (new CreateAccountController)->$method(...$params),
                'login' => (new LoginController)->$method(...$params),
                'register' => (new RegisterController)->$method(...$params),
                'account' => (new AccountController)->$method(...$params),
                default => (new _404Controller)->$method(...$params)
            };
        }
    }
}

<?php

namespace App\Core;

use App\Controllers\CreateAccountController;
use App\Controllers\HomeController;

class Router
{
    public static function route()
    {
        $url = explode('/', filter_var(str_replace('/BIT/php-u3/public/', '', $_SERVER['REQUEST_URI']), FILTER_SANITIZE_URL));
        return match ($url[0]) {
            '', 'home' => (new HomeController)->index(),
            'newAccount' => (new CreateAccountController)->index(),
            default => '<h1>404 Page not found</h1>'
        };
    }
}

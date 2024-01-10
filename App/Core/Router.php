<?php

namespace App\Core;

use App\Controllers;

class Router
{
    protected $controller = 'homeController';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = explode('/', filter_var(str_replace('/BIT/php-u3/public/', '', $_SERVER['REQUEST_URI']), FILTER_SANITIZE_URL));
        if (file_exists('../Controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0] . 'Controller';
        } else {
            return (new $this->controller)->index();
        }
    }
}

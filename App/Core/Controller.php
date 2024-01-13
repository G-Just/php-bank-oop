<?php

namespace App\Core;

class Controller
{
    protected function model($model)
    {
        require __DIR__ . "/../Models/$model.php";
        return new $model();
    }
    protected function view($view, $data = [])
    {
        extract($data);
        ob_start();
        require ROOT . "views/head.php";
        require ROOT . "views/navbar.php";
        require ROOT . "views/$view.php";
        $content = ob_get_clean();
        unset($_SESSION['error']);
        return $content;
    }
}

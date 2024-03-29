<?php

namespace App\Core;

class Controller
{
    protected function model($model, $param)
    {
        require __DIR__ . "/../Models/$model.php";
        return new $model($param);
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
        unset($_SESSION['globalMessage']);
        unset($_SESSION['message']);
        return $content;
    }
}

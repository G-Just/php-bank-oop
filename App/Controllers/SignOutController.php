<?php

namespace App\Controllers;

use App\Core\Controller;

class SignOutController extends Controller
{
    public function index()
    {
        $db = $_SESSION['db'];
        session_unset();
        $_SESSION['db'] = $db;
        header('Location: /');
    }
}

<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return $this->view('login', [$_SESSION['error'] ?? '']);
    }
    public function handlePost()
    {
        header('Location: ' . $this->model('LoginModel')->validate($_POST['email'], $_POST['password']));
    }
}

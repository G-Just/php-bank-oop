<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            header('Location: /');
        } else {
            return $this->view('login', ['error' => $_SESSION['error'] ?? '']);
        }
    }
    public function handlePost()
    {
        return $this->model('LoginModel', '')->validate($_POST['email'], $_POST['password']);
    }
}

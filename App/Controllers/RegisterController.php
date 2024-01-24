<?php

namespace App\Controllers;

use App\Core\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            header('Location: /');
        } else {
            return $this->view('register', ['error' => $_SESSION['error'] ?? '']);
        }
    }
    public function handlePost()
    {
        return $this->model('RegisterModel', '')->validate($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);
    }
}

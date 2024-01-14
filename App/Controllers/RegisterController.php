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
            return $this->view('register');
        }
    }
    public function handlePost()
    {
        return $this->view('login');
    }
}

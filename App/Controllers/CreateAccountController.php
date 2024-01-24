<?php

namespace App\Controllers;

use App\Core\Controller;

class CreateAccountController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $number = $this->model('CreateAccountModel', '')->number;
            return $this->view('newAccount', ['number' => $number, 'error' => $_SESSION['error'] ?? '']);
        } else {
            $_SESSION['error'] = 'Login to gain access to all features';
            header('Location: /login');
        }
    }
    public function handlePost()
    {
        $this->model('CreateAccountModel', '')->validate($_POST['name'], $_POST['lastName'], $_POST['personalCode']);
    }
}

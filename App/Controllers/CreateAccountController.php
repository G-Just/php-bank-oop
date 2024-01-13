<?php

namespace App\Controllers;

use App\Core\Controller;

class CreateAccountController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $model = $this->model('CreateAccountModel');
            $number = $model->number;
            return $this->view('newAccount', [$number, $_SESSION['error'] ?? '']);
        } else {
            $_SESSION['error'] = 'Login to use all features';
            header('Location: /login');
        }
    }
    public function handlePost()
    {
        header('Location: ' . $this->model('CreateAccountModel')->validate($_POST['name'], $_POST['lastName'], $_POST['personalCode']));
    }
}

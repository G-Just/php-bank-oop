<?php

namespace App\Controllers;

use App\Db\FileBaseHandler;
use App\Core\Controller;

class UserListController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $db = new FileBaseHandler('users');
            $users = $db->showAll();
            return $this->view('userlist', ['users' => $users]);
        } else {
            $_SESSION['error'] = 'Login to gain access to all features';
            header('Location: /login');
        }
    }
}

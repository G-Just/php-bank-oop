<?php

namespace App\Controllers;

use App\Db\FileBaseHandler;
use App\Core\Controller;
use App\Db\DataBaseHandler;

class UserListController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['id'])) {
            $_SESSION['db'] === 'file' ? $db = new FileBaseHandler('users') : $db = new DataBaseHandler('users');
            $users = $db->showAll();
            return $this->view('userlist', ['users' => $users]);
        } else {
            $_SESSION['error'] = 'Login to gain access to all features';
            header('Location: /login');
        }
    }
}

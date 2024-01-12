<?php

namespace App\Controllers;

use App\Classes\DataBaseHandler;
use App\Core\Controller;

class UserListController extends Controller
{
    public function index()
    {
        $db = new DataBaseHandler('users');
        $users = $db->showAll();
        return $this->view('userlist', [$users]);
    }
}

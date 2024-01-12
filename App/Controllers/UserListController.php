<?php

namespace App\Controllers;

use App\Core\Controller;

class UserListController extends Controller
{
    public function index()
    {
        return $this->view('userlist');
    }
}

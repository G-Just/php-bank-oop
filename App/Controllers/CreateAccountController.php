<?php

namespace App\Controllers;

use App\Core\Controller;

class CreateAccountController extends Controller
{
    public function index()
    {
        return $this->view('newAccount');
    }
}

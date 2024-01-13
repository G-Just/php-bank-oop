<?php

namespace App\Controllers;

use App\Core\Controller;

class SignOutController extends Controller
{
    public function index()
    {
        header($this->model('SignOutModel')->signOut());
    }
}

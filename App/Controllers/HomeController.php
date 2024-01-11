<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $accounts = $this->model('HomeModel')->accounts;
        return $this->view('home', $accounts);
    }
}

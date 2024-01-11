<?php

namespace App\Controllers;

use App\Classes\DataBaseHandler;
use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $db = new DataBaseHandler('data');
        $accounts = $db->showAll();
        $log = $db->LogshowAll();
        return $this->view('home', [$accounts, $log]);
    }
}

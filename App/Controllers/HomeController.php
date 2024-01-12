<?php

namespace App\Controllers;

use App\Classes\DataBaseHandler;
use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $db = new DataBaseHandler('data');
        $model = $this->model('HomeModel');
        $accounts = $db->showAll();
        $log = $model->getLog();
        $stats = $model->getStats();
        return $this->view('home', [$accounts, $log, $stats]);
    }
}

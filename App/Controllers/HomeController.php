<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $model = $this->model('HomeModel');
        $accounts = $model->accounts->showAll();
        $log = array_reverse($model->getLog());
        $stats = $model->getStats();
        return $this->view('home', ['accounts' => $accounts, 'log' => $log, 'stats' => $stats]);
    }
}

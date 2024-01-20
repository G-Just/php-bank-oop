<?php

namespace App\Controllers;

use App\Core\Controller;

class _404Controller extends Controller
{
    public function index()
    {
        return $this->view('404');
    }
}

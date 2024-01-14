<?php

namespace App\Controllers;

use App\Classes\DataBaseHandler;
use App\Core\Controller;

class AccountController extends Controller
{
    public function dashboard($account)
    {
        $db = new DataBaseHandler('data');
        $account = $db->show($account);
        return $this->view('account', [$account]);
    }
    public function deposit()
    {
    }
    public function withdraw()
    {
    }
}

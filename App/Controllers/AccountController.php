<?php

namespace App\Controllers;

use App\Classes\DataBaseHandler;
use App\Core\Controller;

class AccountController extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new DataBaseHandler('data');
    }
    public function dashboard($account)
    {
        return $this->view('account', ['account' => $this->db->show($account)]);
    }
    public function deposit($account)
    {
        return $this->view('deposit', ['account' => $this->db->show($account)]);
    }
    public function withdraw($account)
    {
        return $this->view('withdraw', ['account' => $this->db->show($account)]);
    }
    public function delete($account)
    {
        return $this->view('delete', ['account' => $this->db->show($account)]);
    }
}

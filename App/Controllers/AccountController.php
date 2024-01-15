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
        if (!isset($_SESSION['id'])) {
            $_SESSION['error'] = 'Login to gain access to all features';
            header('Location: /login');
            die();
        }
    }
    public function dashboard($accountId)
    {
        return $this->view('account', ['account' => $this->db->show($accountId)]);
    }
    public function deposit($accountId)
    {
        return $this->view('deposit', ['account' => $this->db->show($accountId)]);
    }
    public function withdraw($accountId)
    {
        return $this->view('withdraw', ['account' => $this->db->show($accountId)]);
    }
    public function delete($accountId)
    {
        return $this->view('delete', ['account' => $this->db->show($accountId)]);
    }
    public function handleDeposit($accountId)
    {
        return $this->model('DepositModel')->deposit($accountId);
    }
    public function handleWithdrawal($accountId)
    {
        return $this->model('WithdrawModel')->withdraw($accountId);
    }
    public function handleDelete($accountId)
    {
        if ($this->db->show($accountId)['balance'] === 0) {
            $this->db->delete($accountId);
            header('Location: /');
            exit();
        } else {
            $_SESSION['error'] = 'Accounts with non zero balance cannot be deleted';
            header('Location:' . URL . "account/dashboard/$accountId");
            exit();
        }
    }
}

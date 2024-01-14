<?php

use App\Classes\DataBaseHandler;

class DepositModel
{
    private $deposit;
    private $db;
    public function __construct()
    {
        $this->deposit = $_POST['deposit'];
        $this->db = new DataBaseHandler('data');
    }
    public function deposit($accountId)
    {
        if ($this->deposit <= 0 || !isset($this->deposit) || $this->deposit > PHP_INT_MAX) {
            $_SESSION['error'] = 'Invalid deposit amount';
            header('Location: ' . URL . "account/deposit/$accountId");
            exit();
        }
        $accData = $this->db->show($accountId);
        $accData['balance'] += round($this->deposit, 2);
        $accData['balance'] = round($accData['balance'], 2);
        $this->db->update($accountId, $accData);
        header('Location: ' . URL . "account/dashboard/$accountId");
        exit();
    }
}

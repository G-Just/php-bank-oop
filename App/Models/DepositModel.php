<?php

use App\Db\DataBaseHandler;
use App\Db\FileBaseHandler;

class DepositModel
{
    private $deposit;
    private $db;
    public function __construct($medium)
    {
        $this->deposit = $_POST['deposit'];
        $medium === 'file' ? $this->db = new FileBaseHandler('accounts') : $this->db = new DataBaseHandler('accounts');
    }
    public function deposit($accountId)
    {
        if ($this->deposit <= 0 || !isset($this->deposit) || $this->deposit > PHP_INT_MAX) {
            $_SESSION['error'] = 'Invalid deposit amount';
            header('Location: ' . URL . "account/deposit/$accountId");
            die();
        }
        $accData = $this->db->show($accountId);
        $accData['balance'] += round($this->deposit, 2);
        $accData['balance'] = round($accData['balance'], 2);
        $this->db->update($accountId, $accData);
        $_SESSION['message'] = 'Deposited successfully';
        header('Location: ' . URL . "account/dashboard/$accountId");
        exit();
    }
}

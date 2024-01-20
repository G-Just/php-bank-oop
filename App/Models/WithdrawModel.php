<?php

use App\Db\FileBaseHandler;

class WithdrawModel
{
    private $withdraw;
    private $db;
    public function __construct()
    {
        $this->withdraw = $_POST['withdraw'];
        $this->db = new FileBaseHandler('data');
    }
    public function withdraw($accountId)
    {
        $accData = $this->db->show($accountId);
        if ($this->withdraw <= 0 || !isset($this->withdraw) || $this->withdraw > PHP_INT_MAX) {
            $_SESSION['error'] = 'Invalid withdraw amount';
            header('Location: ' . URL . "account/withdraw/$accountId");
            exit();
        }
        if ($this->withdraw > $accData['balance']) {
            $_SESSION['error'] = 'Insufficient funds';
            header('Location: ' . URL . "account/withdraw/$accountId");
            exit();
        }
        $accData['balance'] -= round($this->withdraw, 2);
        $accData['balance'] = round($accData['balance'], 2);
        $this->db->update($accountId, $accData);
        $_SESSION['message'] = 'Withdrew successfully';
        header('Location: ' . URL . "account/dashboard/$accountId");
        exit();
    }
}

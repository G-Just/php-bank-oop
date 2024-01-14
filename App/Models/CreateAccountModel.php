<?php

use App\Classes\DataBaseHandler;

class CreateAccountModel
{
    public $number;
    private $db;
    private $accounts;
    public function __construct()
    {
        $this->db = new DataBaseHandler('data');
        $this->accounts = ($this->db)->showAll();
        $this->number = $this->generateNumber();
    }
    public function validate($name, $lastName, $code)
    {
        $name = htmlspecialchars($name);
        $lastName = htmlspecialchars($lastName);
        $code = htmlspecialchars($code);
        if (strlen($name) === 0 || strlen($lastName) === 0 || strlen($code) === 0) {
            $_SESSION['error'] = 'Empty fields';
            return '/new';
        }
        if (!$this->lengthValidation($name, $lastName)) {
            return '/new';
        }
        if (!$this->codeValidation($code)) {
            return '/new';
        }
        if (!$this->duplicateCheck($code)) {
            return '/new';
        }
        return '/';
    }
    private function codeValidation($code)
    {
        if (strlen($code) === 11) {
            if ($code[0] >= 1 && $code[0] <= 6) {
                if (checkdate(substr($code, 3, 2), substr($code, 5, 2), substr($code, 1, 2))) {
                    $s = $code[0] * 1 + $code[1] * 2 + $code[2] * 3 + $code[3] * 4 + $code[4] * 5 + $code[5] * 6 + $code[6] * 7 + $code[7] * 8 + $code[8] * 9 + $code[9] * 1;
                    if ($s % 11 === 10) {
                        $s = $code[0] * 3 + $code[1] * 4 + $code[2] * 5 + $code[3] * 6 + $code[4] * 7 + $code[5] * 8 + $code[6] * 9 + $code[7] * 1 + $code[8] * 2 + $code[9] * 3;
                        if ($s % 11 === 10 && $s % 11 == $code[10]) {
                            return true;
                        } elseif ($s % 11 == $code[10]) {
                            return true;
                        }
                    } elseif ($s % 11 == $code[10]) {
                        return true;
                    }
                }
            }
        }
        $_SESSION['error'] = 'Invalid personal code';
        return false;
    }
    private function lengthValidation($name, $lastName)
    {
        if (strlen($name) < 3 || strlen($lastName) < 3) {
            $_SESSION['error'] = 'Name and Last name should be at least 3 characters long';
            return false;
        }
        return true;
    }
    private function duplicateCheck($code)
    {
        foreach ($this->accounts as $account) {
            if ($account['personalCode'] === $code) {
                $_SESSION['error'] = 'Account with entered personal number already exists';
                return false;
            }
        }
        return true;
    }
    private function generateNumber()
    {
        $number = '';
        foreach (range(1, 11) as $digit) {
            $number = $number . (string)rand(0, 9);
        }
        foreach ($this->accounts as $account) {
            if ($number === substr($account['number'], 9)) {
                return $this->generateNumber();
            }
        }
        return 'LT0099999' . $number;
    }
}

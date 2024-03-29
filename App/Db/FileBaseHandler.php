<?php

namespace App\Db;

require __DIR__ . '/../../vendor/autoload.php';

use App\Db\DataBase;

class FileBaseHandler implements DataBase
{
    private $data, $log, $database;
    public function __construct($database)
    {
        $this->database = $database;
        $this->data = json_decode(file_get_contents(__DIR__ . '/../database/' . $this->database . '.JSON'), true);
        $this->log = json_decode(file_get_contents(__DIR__ . '/../database/log.JSON'), true);
    }
    private function push()
    {
        file_put_contents(__DIR__ . '/../database/' . $this->database . '.JSON', json_encode($this->data, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/../database/log.JSON', json_encode($this->log, JSON_PRETTY_PRINT));
    }
    public function create(array $userData): void
    {
        if (isset((end($this->data)['id']))) {
            $id = (end($this->data)['id']) + 1;
        } else {
            $id = 0;
        }
        date_default_timezone_set("Europe/Vilnius");
        array_push($this->data, ['id' => $id] + $userData);
        if (isset($_SESSION['id'])) {
            array_push($this->log, ['user' => $_SESSION['username'], 'userAction' => 'created account', 'account' => $userData['name'] . ' ' . $userData['lastName'], 'accountNumber' => $userData['number'], 'stamp' => date('Y F, d @ H:i'), 'amount' => 0]);
        } else {
            array_push($this->log, ['user' => $userData['username'], 'userAction' => 'registered', 'account' => -1, 'accountNumber' => 0, 'stamp' => date('Y F, d @ H:i'), 'amount' => 0]);
        }
        $this->push();
    }
    public function update(int $userId, array $userData): void
    {
        $user = $this->show($userId);
        $amount = $user['balance'] - $userData['balance'];
        $action = $amount < 0 ? 'deposited' : 'withdrew';
        foreach ($this->data as $key => $value) {
            if ($value['id'] === $userId) {
                $this->data[$key] = $userData;
            }
        }
        date_default_timezone_set("Europe/Vilnius");
        array_push($this->log, ['user' => $_SESSION['username'], 'userAction' => $action, 'account' => $userData['firstName'] . ' ' . $userData['lastName'], 'accountNumber' => $userData['IBAN'], 'stamp' => date('Y F, d @ H:i'), 'amount' => round(abs($amount), 2)]);
        $this->push();
    }
    public function delete(int $userId): void
    {
        foreach ($this->data as $key => $user) {
            if ($userId === $user['id']) {
                $name = $user['name'];
                $lastName = $user['lastName'];
                $number = $user['number'];
                unset($this->data[$key]);
            }
        }
        date_default_timezone_set("Europe/Vilnius");
        array_push($this->log, ['user' => $_SESSION['username'], 'userAction' => 'deleted account', 'account' => $name . ' ' . $lastName, 'accountNumber' => $number,  'stamp' => date('Y F, d @ H:i'), 'amount' => 0]);
        $this->push();
    }
    public function show(int $userId): array
    {
        foreach ($this->data as $account) {
            if ($account['id'] === $userId) {
                return $account;
            }
        }
    }
    public function showAll(): array
    {
        return $this->data;
    }
    public function LogShowAll(): array
    {
        return $this->log;
    }
}

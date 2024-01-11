<?php

namespace App\Classes;

require __DIR__ . '/../../vendor/autoload.php';

use App\Classes\DataBase;

class DataBaseHandler implements DataBase
{
    private $data, $log, $database;
    public function __construct($database)
    {
        $this->database = $database;
        $this->data = json_decode(file_get_contents(__DIR__ . '/../database/' . $this->database . '.JSON'), true);
        $this->log = json_decode(file_get_contents(__DIR__ . '/../database/log.JSON'), true);
    }
    public function __destruct()
    {
        file_put_contents(__DIR__ . '/../database/' . $this->database . '.JSON', json_encode($this->data, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/../database/log.JSON', json_encode($this->log, JSON_PRETTY_PRINT));
    }
    function create(array $userData): void
    {
        if (isset((end($this->data)['id']))) {
            $id = (end($this->data)['id']) + 1;
        } else {
            $id = 0;
        }
        date_default_timezone_set("Europe/Vilnius");
        array_push($this->data, ['id' => $id] + $userData);
        array_push($this->log, ['id' => 0, 'action' => 'created account', 'accountID' => $id, 'time' => date('Y F, d @ H:i'), 'amount' => 0]);
    }
    function update(int $userId, array $userData): void
    {
        foreach ($this->data as $key => $user) {
            if ($userId === $user['id']) {
                $amount = $user['balance'] - $userData['balance'];
                $action = $amount > 0 ? 'deposited' : 'withdrew';
                $this->data[$key] = $userData;
            }
        }
        array_push($this->log, ['id' => 0, 'action' => $action, 'accountID' => $userId, 'time' => date('Y F, d @ H:i'), 'amount' => $amount]);
    }
    function delete(int $userId): void
    {
        foreach ($this->data as $key => $user) {
            if ($userId === $user['id']) {
                unset($this->data[$key]);
            }
        }
        array_push($this->log, ['id' => 0, 'action' => 'deleted account', 'accountID' => $userId, 'time' => date('Y F, d @ H:i'), 'amount' => 0]);
    }
    function show(int $userId): array
    {
        foreach ($this->data as $account) {
            if ($account['id'] === $userId) {
                return $account;
            }
        }
    }
    function showAll(): array
    {
        return $this->data;
    }
    function LogshowAll(): array
    {
        return $this->log;
    }
}

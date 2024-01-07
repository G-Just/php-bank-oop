<?php

namespace App\Classes\AccountDataBaseHandler;

require __DIR__ . '/../../../vendor/autoload.php';

use App\Classes\_DB\DataBase;

class AccountDataBaseHandler implements DataBase
{
    private $accounts;
    private $log;
    private function refreshData(): void
    {
        $this->accounts = json_decode(file_get_contents(__DIR__ . '/../../database/data.JSON'), true);
        $this->log = json_decode(file_get_contents(__DIR__ . '/../../database/log.JSON'), true);
    }
    private function writeData(array $accounts, array $log): void
    {
        file_put_contents(__DIR__ . '/../../database/data.JSON', json_encode($accounts, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/../../database/log.JSON', json_encode($log, JSON_PRETTY_PRINT));
    }
    function create(array $userData): void
    {
        $this->refreshData();
        if (isset((end($this->accounts)['id']))) {
            $id = (end($this->accounts)['id']) + 1;
        } else {
            $id = 0;
        }
        array_push($this->accounts, ['id' => $id] + $userData);
        // array_push($this->log, ['id' => $_SESSION['id'], 'action' => 'created account', 'accountID' => $id, 'time' => date('F/d')]);
        date_default_timezone_set("Europe/Vilnius");
        array_push($this->log, ['id' => 0, 'action' => 'created account', 'accountID' => $id, 'time' => date('Y F, d @ H:i'), 'amount' => 0]);
        $this->writeData($this->accounts, $this->log);
    }
    function update(int $userId, array $userData): void
    {
        $this->refreshData();
        foreach ($this->accounts as $user) {
            if ($userId === $user['id']) {
                $user = $userData;
            }
        }
        $this->writeData($this->accounts, $this->log);
    }
    function delete(int $userId): void
    {
        $this->refreshData();
        foreach ($this->accounts as $key => $user) {
            if ($userId === $user['id']) {
                unset($this->accounts[$key]);
            }
        }
        $this->writeData($this->accounts, $this->log);
    }
    function show(int $userId): array
    {
        $this->refreshData();
        foreach ($this->accounts as $account) {
            if ($account['id'] === $userId) {
                return $account;
            }
        }
    }
    function showAll(): array
    {
        $this->refreshData();
        return $this->accounts;
    }
    function LogShowAll(): array
    {
        $this->refreshData();
        return $this->log;
    }
}

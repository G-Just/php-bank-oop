<?php

namespace App\Classes\UserDataBaseHandler;

require __DIR__ . '/../../../vendor/autoload.php';

use App\Classes\_DB\DataBase;

class UserDataBaseHandler implements DataBase
{
    private $users;
    private $log;
    private function refreshData(): void
    {
        $this->users = json_decode(file_get_contents(__DIR__ . '/../../database/users.JSON'), true);
        $this->log = json_decode(file_get_contents(__DIR__ . '/../../database/log.JSON'), true);
    }
    private function writeData(array $users, array $log): void
    {
        file_put_contents(__DIR__ . '/../../database/data.JSON', json_encode($users, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/../../database/log.JSON', json_encode($log, JSON_PRETTY_PRINT));
    }
    function create(array $userData): void
    {
    }
    function update(int $userId, array $userData): void
    {
    }
    function delete(int $userId): void
    {
    }
    function show(int $userId): array
    {
        $this->refreshData();
        foreach ($this->users as $user) {
            if ($user['id'] === $userId) {
                return $user;
            }
        }
    }
    function showAll(): array
    {
        $this->refreshData();
        return $this->users;
    }
    function LogShowAll(): array
    {
        $this->refreshData();
        return $this->log;
    }
}

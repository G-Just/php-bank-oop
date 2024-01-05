<?php

namespace App\Classes\AccountDataBaseHandler;

require __DIR__ . '/../../../vendor/autoload.php';


use App\Classes\DB\DataBase;


class AccountDataBaseHandler implements DataBase
{
    private $data;
    private function refresh(): void
    {
        $this->data = json_decode(file_get_contents(__DIR__ . '/../../database/data.JSON'), true);
    }
    function create(array $userData): void
    {
        $this->refresh();
        if (isset((end($this->data)['id']))) {
            $id = (end($this->data)['id']) + 1;
        } else {
            $id = 0;
        }
        $userData = [['id'] => $id] + $userData;
    }
    function update(int $userId, array $userData): void
    {
    }
    function delete(int $userId): void
    {
    }
    function show(int $userId): array
    {
        $this->refresh();
        foreach ($this->data as $user) {
            if ($user['id'] === $userId) {
                return $user;
            }
        }
    }
    function showAll(): array
    {
        $this->refresh();
        return $this->data;
    }
}

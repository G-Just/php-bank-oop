<?php

namespace App\Classes\AccountDataBaseHandler;

require __DIR__ . '/../../../vendor/autoload.php';


use App\Classes\_DB\DataBase;


class AccountDataBaseHandler implements DataBase
{
    private $data;
    private $log;
    private function refreshData(): void
    {
        $this->data = json_decode(file_get_contents(__DIR__ . '/../../database/data.JSON'), true);
        $this->log = json_decode(file_get_contents(__DIR__ . '/../../database/log.JSON'), true);
    }
    private function writeData(array $data, array $log): void
    {
        file_put_contents(__DIR__ . '/../../database/data.JSON', json_encode($data, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/../../database/log.JSON', json_encode('', JSON_PRETTY_PRINT));
    }
    function create(array $userData): void
    {
        $this->refreshData();
        if (isset((end($this->data)['id']))) {
            $id = (end($this->data)['id']) + 1;
        } else {
            $id = 0;
        }
        array_push($this->data, ['id' => $id] + $userData);
        $this->writeData($this->data, $this->log);
    }
    function update(int $userId, array $userData): void
    {
        $this->refreshData();
        foreach ($this->data as $user) {
            if ($userId === $user['id']) {
                $user = $userData;
            }
        }
        $this->writeData($this->data, $this->log);
    }
    function delete(int $userId): void
    {
        $this->refreshData();
        foreach ($this->data as $key => $user) {
            if ($userId === $user['id']) {
                unset($this->data[$key]);
            }
        }
        $this->writeData($this->data, $this->log);
    }
    function show(int $userId): array
    {
        $this->refreshData();
        foreach ($this->data as $user) {
            if ($user['id'] === $userId) {
                return $user;
            }
        }
    }
    function showAll(): array
    {
        $this->refreshData();
        return $this->data;
    }
}

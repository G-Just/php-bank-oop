<?php

namespace App\Classes;

use App\Classes\DB\DataBase;

require __DIR__ . '/../../vendor/autoload.php';

class AccountDataBaseHandler implements DataBase
{
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
        return [];
    }
    function showAll(): array
    {
        return [];
    }
}

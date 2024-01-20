<?php

namespace App\Db;

require __DIR__ . '/../../vendor/autoload.php';

use App\Db\DataBase;
use PDO;

class DataBaseHandler implements DataBase
{
    private $pdo, $table;
    public function __construct($table)
    {
        $host = 'localhost';
        $db = 'bank';
        $userName = 'root';
        $password = '';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $userName, $password, $options);
        $this->table = $table;
    }
    public function create(array $userData): void
    {
    }
    public function update(int $userId, array $userData): void
    {
    }
    public function delete(int $userId): void
    {
    }
    public function show(int $userId): array
    {
        return [];
    }
    public function showAll(): array
    {
        return [];
    }
}

$x = new DataBaseHandler('accounts');

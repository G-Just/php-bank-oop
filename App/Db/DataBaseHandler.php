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
        $sql = "INSERT INTO {$this->table} (accountID, name, lastName, number, code, balance) VALUES (?, ?, ?, ?, ?, ?)";
        $this->pdo->prepare($sql)->execute([$userData['id'], $userData['name'], $userData['lastName'], $userData['number'], $userData['code'], $userData['balance']]);
    }
    public function update(int $userId, array $userData): void
    {
        $sql = "UPDATE {$this->table} SET name = ?, lastName = ?, number = ?, code = ?, balance = ? WHERE accountID = ?";
        $this->pdo->prepare($sql)->execute([$userData['name'], $userData['lastName'], $userData['number'], $userData['code'], $userData['balance'], $userId]);
    }
    public function delete(int $userId): void
    {
        $sql = "DELETE FROM {$this->table} WHERE accountID = ?";
        $this->pdo->prepare($sql)->execute([$userId]);
    }
    public function show(int $userId): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE accountID = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$userId]);
        return $statement->fetch();
    }
    public function showAll(): array
    {
        $sql = "SELECT * FROM {$this->table}";
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }
}

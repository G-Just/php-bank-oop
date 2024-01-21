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
        $sql = "INSERT INTO {$this->table} (accountID, accountName, accountLastName, accountNumber, accountPersonalCode, accountBalance) VALUES (?, ?, ?, ?, ?, ?)";
        $this->pdo->prepare($sql)->execute([$userData['id'], $userData['fname'], $userData['lname'], $userData['num'], $userData['code'], $userData['balance']]);
    }
    public function update(int $userId, array $userData): void
    {
    }
    public function delete(int $userId): void
    {
    }
    public function show(int $userId): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE accountID=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$userId]);
        return $statement->fetch();
    }
    public function showAll(): array
    { {
            $sql = "SELECT * FROM {$this->table}";
            $statement = $this->pdo->query($sql);
            return $statement->fetchAll();
        }
    }
}
$x = new DataBaseHandler('accounts');
// $x->create(['id' => 0, 'fname' => 'John', 'lname' => 'James', 'num' => 'LT3249i2', 'code' => '38239498', 'balance' => 0]);
// print_r($x->show(0));

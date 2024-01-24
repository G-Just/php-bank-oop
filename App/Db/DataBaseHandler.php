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
        if ($this->table === 'accounts') {
            $sql = "INSERT INTO {$this->table} (firstName, lastName, IBAN, code, balance) VALUES (?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)->execute([$userData['firstName'], $userData['lastName'], $userData['IBAN'], $userData['code'], $userData['balance']]);
            $sql = "INSERT INTO log (user, userAction, account, accountNumber, stamp, amount) VALUES (?, ?, ?, ?, ?, ?)";
            date_default_timezone_set("Europe/Vilnius");
            if (isset($_SESSION['id'])) {
                $this->pdo->prepare($sql)->execute([$_SESSION['username'], 'created account', $userData['name'] . ' ' . $userData['lastName'],  $userData['IBAN'], date('Y F, d @ H:i'), 0]);
            } else {
                $this->pdo->prepare($sql)->execute([$userData['firstName'], 'registered', '-1',  0, date('Y F, d @ H:i'), 0]);
            }
        } else {
            $sql = "INSERT INTO {$this->table} (username, email, userRole, userStatus, created, userPassword) VALUES (?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)->execute([$userData['username'], $userData['email'], $userData['role'], $userData['status'], $userData['created'], $userData['password']]);
        }
    }
    public function update(int $userId, array $userData): void
    {
        $user = $this->show($userId);
        $amount = $user['balance'] - $userData['balance'];
        $action = $amount < 0 ? 'deposited' : 'withdrew';
        $sql = "UPDATE {$this->table} SET firstName = ?, lastName = ?, IBAN = ?, code = ?, balance = ? WHERE id = ?";
        $this->pdo->prepare($sql)->execute([$userData['firstName'], $userData['lastName'], $userData['IBAN'], $userData['code'], $userData['balance'], $userId]);

        $sql = "INSERT INTO log (user, userAction, account, accountNumber, stamp, amount) VALUES (?, ?, ?, ?, ?, ?)";
        date_default_timezone_set("Europe/Vilnius");
        $this->pdo->prepare($sql)->execute([$_SESSION['username'], $action, $userData['name'] . ' ' . $userData['lastName'],  $userData['IBAN'], date('Y F, d @ H:i'), abs($amount)]);
    }
    public function delete(int $userId): void
    {
        $userData = $this->show($userId);
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $this->pdo->prepare($sql)->execute([$userId]);

        $sql = "INSERT INTO log (user, userAction, account, accountNumber, stamp, amount) VALUES (?, ?, ?, ?, ?, ?)";
        date_default_timezone_set("Europe/Vilnius");
        $this->pdo->prepare($sql)->execute([$_SESSION['username'], 'deleted account', $userData['name'] . ' ' . $userData['lastName'],  $userData['IBAN'], date('Y F, d @ H:i'), 0]);
    }
    public function show(int $userId): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
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
    public function LogShowAll(): array
    {
        $sql = "SELECT * FROM log";
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }
}

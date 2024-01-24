<?php

use App\Db\DataBaseHandler;
use App\Db\FileBaseHandler;

class LoginModel
{
    private $db;
    public function __construct($medium)
    {
        $medium === 'file' ? $this->db = new FileBaseHandler('users') : $this->db = new DataBaseHandler('users');
    }
    public function validate($email, $password)
    {
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $users = $this->db->showAll();
        if (strlen($email) === 0 || strlen($password) === 0) {
            $_SESSION['error'] = 'Empty fields';
            header('Location: /login');
        }
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                if (password_verify($password, $user['userPassword'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['userRole'] = $user['userRole'];
                    $_SESSION['actions'] = $user['actions'];
                    $_SESSION['created'] = $user['created'];
                    $_SESSION['error'];
                    header('Location: /');
                    exit();
                } else {
                    $_SESSION['error'] = 'Wrong password';
                    header('Location: /login');
                    die();
                }
            }
        }
        $_SESSION['error'] = 'Email does not exist';
        header('Location: /login');
        die();
    }
}

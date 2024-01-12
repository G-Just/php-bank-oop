<?php

use App\Classes\DataBaseHandler;

class LoginModel
{
    public static function validate($email, $password)
    {
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $db = new DataBaseHandler('users');
        $users = $db->showAll();
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    return 'Location: /';
                    exit();
                } else {
                    return 'Location: /login';
                    exit();
                }
            }
        }
        return 'Location: /login';
        exit();
    }
}

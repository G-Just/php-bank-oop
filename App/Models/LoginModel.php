<?php

use App\Classes\DataBaseHandler;

class LoginModel
{
    public function validate($email, $password)
    {
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $db = new DataBaseHandler('users');
        $users = $db->showAll();
        if (strlen($email) === 0 || strlen($password) === 0) {
            $_SESSION['error'] = 'Empty fields';
            return '/login';
        }
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['actions'] = $user['actions'];
                    $_SESSION['created'] = $user['created'];
                    $_SESSION['error'];
                    return '/';
                } else {
                    $_SESSION['error'] = 'Wrong password';
                    return '/login';
                }
            }
        }
        $_SESSION['error'] = 'Email does not exist';
        return '/login';
    }
}

<?php

use App\Db\FileBaseHandler;

class RegisterModel
{
    public function validate($username, $email, $password, $confirmPassword)
    {
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $password = htmlspecialchars($password);
        $confirmPassword = htmlspecialchars($confirmPassword);
        $db = new FileBaseHandler('users');
        $users = $db->showAll();
        if (strlen($email) === 0 || strlen($password) === 0 || strlen($username) === 0) {
            $_SESSION['error'] = 'Empty fields';
            header('Location: /register');
            die();
        }
        foreach ($users as $user) {
            if ($email === $user['email']) {
                $_SESSION['error'] = 'Account with entered email address already exists';
                header('Location: /register');
                die();
            }
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'Invalid email address';
            header('Location: /register');
            die();
        }
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match';
            header('Location: /register');
            die();
        }
        date_default_timezone_set("Europe/Vilnius");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $db->create(['username' => $username, 'email' => $email, 'role' => 'Operator', 'status' => 'Active', 'created' => date('M d, Y'), 'password' => $password]);
        $_SESSION['message'] = 'Signed up successfully, try logging in';
        header('Location: /login');
        exit();
    }
}

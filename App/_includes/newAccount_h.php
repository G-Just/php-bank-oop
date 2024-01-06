<?php
require __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = new App\Classes\AccountDataBaseHandler\AccountDataBaseHandler();
    header('Location: ./../../public/index.php?status=created');
    exit();
} else {
    header('Location: ./../../public/index.php?error=unauthorized');
    die();
}

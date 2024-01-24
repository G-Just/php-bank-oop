<?php

namespace App\Controllers;

use App\Core\Controller;

class DBChangeController extends Controller
{
    public function handlePost()
    {
        $_SESSION['db'] === 'file' ? $_SESSION['db'] = 'database' : $_SESSION['db'] = 'file';
        header('Location: /logout');
    }
}

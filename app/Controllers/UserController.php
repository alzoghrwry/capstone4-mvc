<?php
namespace App\Controllers;

use App\Models\User;

class UserController
{
  public function index()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /capstone4-mvc-ch4/public/login');
        exit;
    }

    $users = (new User())->all();
    include __DIR__ . '/../Views/users/index.php';
}

    
}

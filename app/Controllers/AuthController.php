<?php
namespace App\Controllers;

use App\Core\App;
use App\Models\User;

class AuthController
{
    public function showLogin() {
        include __DIR__ . '/../Views/auth/login.php';
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = (new User)->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user'] = $user;
            header('Location: /capstone4-mvc-ch4/public/users/index');
             exit;

        } else {
            $error = "Invalid credentials";
            include __DIR__ . '/../views/auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
     public function showRegister()
    {
        include __DIR__ . '/../Views/auth/register.php';
    }

    public function register()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        $error = '';

        if ($password !== $confirm) {
            $error = "Passwords do not match";
        } elseif ((new User)->findByEmail($email)) {
            $error = "Email already exists";
        } else {
            (new User)->create($name, $email, $password);
            header('Location: /capstone4-mvc-ch4/public/login');
            exit;
        }

        include __DIR__ . '/../Views/auth/register.php';
    }
}

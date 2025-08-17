<?php
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\UserController;

$router=new Router();
$router->get('/', function() {
    header('Location: /capstone4-mvc-ch4/public/login');
    exit;
});

$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);
// Users
$router->get('/users/index', [UserController::class, 'index']);
$router->get('/users', function() {
    header('Location: /capstone4-mvc-ch4/public/users/index');
    exit;
});

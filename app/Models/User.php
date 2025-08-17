<?php
namespace App\Models;

use App\Core\App;
use PDO;

class User
{
    public function all(): array
    {
        $stmt = App::db()->prepare("SELECT * FROM `users`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public  function findByEmail(string $email) {
        $pdo = App::db();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }
    public function create(string $name, string $email, string $password): bool
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = App::db()->prepare(
            "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"
        );

        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }
}

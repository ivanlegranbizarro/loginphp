<?php

function get_username(object $pdo, string $username): array|bool
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function get_email(object $pdo, string $email): array|bool
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_user(object $pdo, string $username, string $email, string $password): void
{
    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12,
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();
}

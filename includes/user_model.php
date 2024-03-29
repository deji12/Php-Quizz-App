<?php

declare(strict_types= 1);

function get_username (object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":username", $username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_email (object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function create_user(object $pdo, string $username, $first_name, $last_name, $email, string $pwd) {
    $query = "INSERT INTO users (username, first_name, last_name, email, pwd) VALUES (:username, :first_name, :last_name, :email, :pwd);";
    $statement = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashed_password = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $statement->bindParam(":username", $username);
    $statement->bindParam(":first_name", $first_name);
    $statement->bindParam(":last_name", $last_name);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":pwd", $hashed_password);

    $statement->execute();
}

function get_user(object $pdo, string $username) {
    $query = "SELECT * FROM users WHERE username = :username;";
    $statement = $pdo->prepare($query);

    $statement->bindParam(":username", $username);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_user_username(object $pdo, string $username) {
    $query = "UPDATE users SET username = :username WHERE id = :id;";
    $statement = $pdo->prepare($query);

    $statement->bindParam(":username", $username);
    $statement->bindParam(":id", $_SESSION["user_id"]);

    $statement->execute();
    $_SESSION["user_username"] = $username;
}

function update_user_password(object $pdo, string $pwd) {
    $query = "UPDATE users SET pwd = :pwd WHERE id = :id;";
    $statement = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    $hashed_password = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $statement->bindParam(":pwd", $hashed_password);
    $statement->bindParam(":id", $_SESSION["user_id"]);

    $statement->execute();
}
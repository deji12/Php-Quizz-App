<?php

declare(strict_types=1);

function create_quiz($pdo, string $title, int $duration) {

    $query = "INSERT INTO Quiz (title, duration, creator_id) VALUES (:title, :duration, :creator_id);";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':title', $title);
    $statement->bindParam(':duration', $duration);
    $statement->bindParam(':creator_id', $_SESSION["user"]["id"]);
    $statement->execute();

    return $pdo->lastInsertId();
}

function get_quizzes(object $pdo){
    $query = "SELECT * FROM Quiz;";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


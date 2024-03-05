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

function get_admin_quizzes(object $pdo){
    $query = "SELECT * FROM Quiz WHERE creator_id = :id ORDER BY id DESC;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':id', $_SESSION["user"]["id"]);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function update_quiz_enteries(object $pdo, int $quiz_id) {
    $query = "UPDATE Quiz SET number_of_enteries = number_of_enteries + 1 WHERE id = :id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $quiz_id);
    $statement->execute();
}

function update_quiz_passes(object $pdo, int $quiz_id) {
    $query = "UPDATE Quiz SET number_of_passes = number_of_passes + 1 WHERE id = :id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $quiz_id);
    $statement->execute();
}
function update_quiz_fails(object $pdo, int $quiz_id) {
    $query = "UPDATE Quiz SET number_of_fails = number_of_fails + 1 WHERE id = :id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $quiz_id);
    $statement->execute();
}

function update_quiz_title(object $pdo, string $title, int $quiz_id) {
    $query = "UPDATE Quiz SET title = :title WHERE id = :id;";
    $statement = $pdo->prepare($query);

    $statement->bindParam(":title", $title);
    $statement->bindParam(":id", $quiz_id);

    $statement->execute();
}

function update_quiz_duration(object $pdo, int $duration, int $quiz_id) {
    $query = "UPDATE Quiz SET duration = :duration WHERE id = :id;";
    $statement = $pdo->prepare($query);

    $statement->bindParam(":duration", $duration);
    $statement->bindParam(":id", $quiz_id);

    $statement->execute();
}
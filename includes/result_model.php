<?php

declare(strict_types=1);

function new_result(object $pdo, int $quiz_id, int $student_id, int $grade) {
    $query = "INSERT INTO Result (quiz_id, student_id, grade) VALUES (:quiz_id, :student_id, :grade);";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":quiz_id", $quiz_id);
    $statement->bindParam(":student_id", $student_id);
    $statement->bindParam(":grade", $grade);
    $statement->execute();
}

function get_results(object $pdo){
    $query = "SELECT * FROM Result WHERE student_id = :student_id ORDER BY id DESC;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":student_id", $_SESSION["user"]["id"]);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_result(object $pdo, int $quiz_id){
    $query = "SELECT * FROM Result WHERE student_id = :student_id AND quiz_id = :quiz_id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":student_id", $_SESSION["user"]["id"]);
    $statement->bindParam(":quiz_id", $quiz_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}
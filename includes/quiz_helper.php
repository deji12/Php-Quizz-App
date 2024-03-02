<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $duration = $_POST["duration"];

    try {

        require_once 'db.php';
        require_once 'quiz_model.php';

        $new_quiz_id = create_quiz($pdo, $title, intval($duration));

        header("Location: ../add_question.php?quiz_id=$new_quiz_id");

    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}
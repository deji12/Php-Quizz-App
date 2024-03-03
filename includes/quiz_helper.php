<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $duration = $_POST["duration"];

    $errors = [];

    try {

        require_once 'db.php';
        require_once 'quiz_model.php';

        if (empty($title)) {
            $errors["empty_title"] = "Please enter a title";
        }
        if (empty($duration)) {
            $errors["empty_duration"] = "Please enter a duration";
        }

        if (intval($duration) < 5){
            $errors["short_duration"] = "The duration is too short.";
        }

        $_SESSION["quiz_errors"] = $errors;

        if(!empty($errors)){
            header("Location: ../create_quiz.php");
            die();
        }

        $new_quiz_id = create_quiz($pdo, $title, intval($duration));

        header("Location: ../add_question.php?quiz_id=$new_quiz_id");

    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}
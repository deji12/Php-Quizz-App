<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $duration = $_POST["duration"];
    $quiz_id = $_GET["quiz_id"];

    try {

        require_once 'db.php';
        require_once 'quiz_model.php';
        require_once 'question_and_option_models.php';

        $errors = [];

        $quiz = get_quiz($pdo, $quiz_id);

        if ($quiz["title"] !== $title && $title) {
            update_quiz_title($pdo, $title, intval($quiz_id));
        }

        if ($quiz["duration"] !== intval($duration) && $duration) {
            if (intval($duration) < 5){

                $errors["short_duration"] = "The duration is too short.";
                $_SESSION["quiz_errors"] = $errors;

                header("Location: edit-quiz.php?quiz_id=$quiz_id");
                die();

            }
            update_quiz_duration($pdo, intval($duration), intval($quiz_id));
        }

        header("Location: ../my_quizzes.php");
        die();

    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $question = $_POST["question"];
    $quiz_id = $_POST["quiz_id"];
    $question_id = $_POST["question_id"];

    $options = array(
        "option_1" => $_POST["option1"],
        "option_2" => $_POST["option2"],
        "option_3" => $_POST["option3"],
        "option_4" => $_POST["option4"]
    );

    $correct_option = intval($_POST["correct_option"]);

    try {

        require_once 'db.php';
        require_once 'question_and_option_models.php';

        edit_question_and_options($pdo, $question, $options, $question_id, $correct_option);

        header("Location: ../take_quiz.php?quiz_id=$quiz_id");
        die();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}
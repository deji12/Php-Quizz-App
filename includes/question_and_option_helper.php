<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $question = $_POST["question"];
    $quiz_id = $_POST["quiz_id"];

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

        create_question_and_options($pdo, $question, $options, $quiz_id, $correct_option);

        header("Location: ../add_question.php?quiz_id=$id");
        die();

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }

} else {
    $id = $_GET['quiz_id'];
    header("Location: add_question.php?quiz_id=$id");
    die();
}
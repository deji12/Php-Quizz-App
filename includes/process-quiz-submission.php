<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $formData = $_POST;

    try {

        require_once 'db.php';
        require_once 'quiz_model.php';
        require_once 'question_and_option_models.php';
        require_once 'result_model.php';

        $number_of_correct = 0;

        $quiz = get_quiz($pdo, $_GET["quiz_id"]);

        foreach ($formData['option'] as $question_id => $selected_option) {
        
            if (is_option_correct($pdo, $question_id, $selected_option)) {
                $number_of_correct ++;
            }
        }

        $grade = ($number_of_correct/$quiz["number_of_questions"]) * 100;
        $grade = number_format($grade, 2);

        update_quiz_enteries($pdo, $quiz["id"]);

        new_result($pdo, $quiz["id"], $_SESSION["user"]["id"], $grade);

        if ($grade > 50) {
            update_quiz_passes($pdo, $quiz["id"]);
        } else {
            update_quiz_fails($pdo, $quiz["id"]);
        }

        header("Location: ../result.php");
        die();

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}
<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function update_question_number(object $pdo, int $quiz_id){
    $query = "UPDATE Quiz SET number_of_questions = number_of_questions + 1 WHERE id = :quiz_id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':quiz_id', $quiz_id);
    $statement->execute();
}

function get_quiz(object $pdo, int $quiz_id) {
    $query = "SELECT * FROM Quiz WHERE id = :quiz_id;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':quiz_id', $quiz_id);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function create_question_and_options(object $pdo, string $question, array $options, int $quiz_id, int $correct) {

    $query = "INSERT INTO questions (question, quiz_id) VALUES (:question, :quiz_id);";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':question', $question);
    $statement->bindParam(':quiz_id', $quiz_id);
    $statement->execute();

    $question_id = $pdo->lastInsertId();

    $option_number = 1;

    foreach ($options as $option) {
        $query = "INSERT INTO options (option_number, option_content, correct_option, question_id) VALUES (:option_number, :option_content, :correct_option, :question_id);";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':option_number', $option_number);
        $statement->bindParam(':option_content', $option);

        if ($correct == $option_number) {
            $correct_option = 1;
        } else {
            $correct_option = 0;
        }
        $statement->bindParam(':correct_option', $correct_option, PDO::PARAM_INT); // Ensure correct_option is bound as integer
        $statement->bindParam(':question_id', $question_id);
        $statement->execute();

        $option_number ++;
    }

    update_question_number($pdo, intval($quiz_id));
}
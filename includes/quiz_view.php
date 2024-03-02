<?php

function display_quizzes(){

    require_once 'db.php';
    require_once 'quiz_model.php';

    $quizzes = get_quizzes($pdo);

    foreach($quizzes as $quiz) {
        echo '<div class="info">';
        echo  '<span><a href="#">' . $quiz["title"] . '</a></span>';
        echo '<span>' . $quiz["number_of_questions"] . '</span>';
        echo '<span>' . $quiz["duration"] . '</span>';
        echo '</div>';
    }
}
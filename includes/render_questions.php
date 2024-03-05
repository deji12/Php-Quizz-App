<?php

function display_questions($pdo, $quiz_id){

    $questions = get_questions($pdo, $quiz_id);
    $quiz = get_quiz($pdo, $quiz_id);

    $question_number = 1;
    echo '<form method="POST" action="includes/process-quiz-submission.php?quiz_id=' . $quiz_id . '" id="question_form">';

    foreach ($questions as $question) {

        $options = get_options($pdo, $question["id"]); // Fetch options for the current question
    
        echo '<div class="question-content">
                <span id="error"> <br></span>
                <span class="question">' . $question_number . '. ' . $question["question"] . ($_SESSION["user"]["id"] == $quiz["creator_id"] ? ' - <a href="edit-question.php?question_id=' . $question["id"] . '&quiz_id=' . $quiz_id . '">Edit</a>' : '') . '</span><br><br>

                <div class="options">';
                
        // Loop through options and display radio buttons
        foreach ($options as $option) {
            echo '<label>
                    <span><input type="radio" name="option[' . $question["id"] . ']" value="' . $option["option_number"] . '" id="option' . $option["option_number"] . '"> ' . $option["option_content"] . '</span>
                  </label>';
        }
        
        echo '</div></div>';
    
        $question_number++;
    }

    echo '<center><button type="button" id="quiz-submit-btn" style="margin: 10px;">Submit</button></center>';

    echo '</form>';
}
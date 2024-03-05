<?php

function render_form(){

    require_once 'db.php';
    require_once 'question_and_option_models.php';

    $question = get_question($pdo, $_GET["question_id"]);

    $options = get_options($pdo, $_GET["question_id"]);
    $question_id = $_GET['question_id'];
    $quiz_id = $_GET["quiz_id"];

    echo '<form method="POST" action="includes/edit-question-helper.php">

            <div class="txt_field">
                <input type="text" Value="' . $question["question"] . '" required name="question">
                <span></span>
                <label>Question</label>
            </div>
            <input type="text" name="question_id" value="' . $question_id . '" hidden>
            <input type="text" name="quiz_id" value="' . $quiz_id . '" hidden>';
            

            foreach($options as $option) {

                echo '<div class="txt_field">
                    <input type="text" value="' .  $option["option_content"] . '" required name="option' . $option["option_number"] . '">
                    <span></span>
                    <label>Option ' . $option["option_number"] . ' </label>
                </div>';

            }


            foreach($options as $option) {
                if($option["correct_option"]) {
                    echo 'Option ' . $option["option_number"] . '<input type="radio" name="correct_option" value="' . $option["option_number"] . '" id="" checked>';
                } else {
                    echo 'Option ' . $option["option_number"] . '<input type="radio" name="correct_option" value="' . $option["option_number"] . '" id="">';
                }
            }

            echo '<br><br>
            <input type="submit" value="Edit question">
            <br><br>
        </form>';

}


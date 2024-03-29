<?php

if (!isset($_GET["quiz_id"])){
    header("Location: index.php");
    die();
}

require_once 'includes/db.php';
require_once 'includes/question_and_option_models.php';
require_once 'includes/render_questions.php';

$quiz = get_quiz($pdo, intval($_GET["quiz_id"]));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

   <?php 
   include 'nav.php'; 
   
   echo '<script>const quizDuration = ' . $quiz['duration'] * 60 . ';</script>';
   ?>

    <div class="container" id="brief">
        <div class="question-body">
            <div class="info">
            <?php 

                if ($_SESSION["user"]["id"] == $quiz["creator_id"]) {
                    echo '<span>' . $quiz["title"] . '</a></span>'; 
                } else {
                    echo '<span>' . $quiz["title"] . '</span>';
                }
                
            ?>


            <?php echo '<span> No. questions: ' . $quiz["number_of_questions"] . '</span>' ?>
                <!-- <span id="time" style="padding: 10px;">00:15</span> -->
            </div>

            <?php 
                if ($_SESSION["user"]["id"] == $quiz["creator_id"]) {
                    echo '<div class="info">
                                <a href="add_question.php?quiz_id=' . $_GET["quiz_id"] . '">Add question</a>
                                <span>|</span>
                                <a href="edit-quiz.php?quiz_id=' . $_GET["quiz_id"] . '"> Edit Quiz details </a>
                            </div>';
                }
            ?>
            <?php echo '<div class="info">1. You will have a total of ' . $quiz["duration"] . ' minutes for this quiz.</div>' ?>
            <div class="info">2. Answers selected can be changed.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're taking it, or it will auto submit.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
            <center>
            <div class="buttons">
                <button style="margin: 10px;" id="quit">Exit Quiz</button>
                <button style="margin: 10px;" id="start">Continue</button>
            </div>
            </center>
        </div>
    </div>

    <div class="container" id="quiz-container">
        <div class="question-body">
            <div class="info header">
                <?php echo '<span>' . $quiz["title"] . '</span>'; ?>
                <?php 
                    if (!$_SESSION["user"]["is_admin"]) {
                        echo '<span id="time" style="padding: 10px;"></span> ';
                    }
                ?>
            </div>
            
            <?php

                display_questions($pdo, $_GET["quiz_id"]);
            ?>

        </div>
    </div>
<script src="./static/countdown.js"></script>
<script src="./static/scripts.js"></script>

<script>
    const formSubmitBtn = document.getElementById('quiz-submit-btn');
    formSubmitBtn.addEventListener('click', function (e){
        if (confirm("You are about to submit quiz\nOnce submit, you will be graded immediately") == true) {
            form.submit();
        } else {
            e.preventDefault();
        }
    })

</script>
</body>
</html>
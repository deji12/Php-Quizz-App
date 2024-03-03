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
</head>
<body>

   <?php 
   include 'nav.php'; 
   
   echo '<script>const quizDuration = ' . $quiz['duration'] * 60 . ';</script>';
   ?>

   

    <div class="container" id="brief">
        <div class="question-body">
            <div class="info">
            <?php echo '<span>' . $quiz["title"] . ' - <a href="edit-quiz.php?quiz_id=' . $_GET["quiz_id"]. '">Edit</a></span>' ?>
                <?php echo '<span> No. questions: ' . $quiz["number_of_questions"] . '</span>' ?>
                <!-- <span id="time" style="padding: 10px;">00:15</span> -->
            </div>
            
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
            <div class="info">
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
</body>
</html>
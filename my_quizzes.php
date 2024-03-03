<?php

session_start();
require_once 'includes/quiz_view.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
    <link rel="stylesheet" href="./static/style.css">
</head>
<body>

    <?php include 'nav.php'; ?>

    <div class="container">
        <div class="question-body">

            <div class="info">
                <span>Quiz name</span>
                <span>Questions number</span>
                <span>Duration</span>
            </div>

            <?php display_admin_quizzes(); ?>
            
            
        </div>
    </div>
</body>
</html>
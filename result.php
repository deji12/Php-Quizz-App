<?php

session_start();

require_once 'includes/db.php';
require_once 'includes/question_and_option_models.php';
require_once 'includes/result_model.php';

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

    <?php include 'nav.php'; ?>

    <div class="container">
        <div class="question-body">

            <div class="info header">
                <h4>Name</h4>
                <span>Grade</span>
                <span>Date</span>
            </div>

            <?php


                $results = get_results($pdo);

                foreach($results as $result) {

                    $quiz = get_quiz($pdo, $result["quiz_id"]);

                    echo '<div class="info">
                            <h4>' . $quiz["title"] . ' </h4>
                            <span>' . $result["grade"] . ' </span>
                            <span>' . date('F j, Y, g:i a', strtotime($result["created_at"])) . '</span>
                        </div>';

                }
            ?>    
        </div>
    </div>
<script src="./scripts.js"></script>
</body>
</html>
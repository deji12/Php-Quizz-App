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
            <div class="info">
                <span>Quiz name</span>
                <span>17/20</span>
                <!-- <span id="time" style="padding: 10px;">00:15</span> -->
            </div>
            
            <?php 
                require_once 'includes/render_questions.php';

                display_questions($_GET["quiz_id"]);
            ?>

        </div>
    </div>
<script src="./static/countdown.js"></script>
</body>
</html>
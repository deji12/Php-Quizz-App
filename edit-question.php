<?php 

if (!isset($_GET["question_id"])){
    header("Location: create_quiz.php");
}

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/style.css">
    <link rel="stylesheet" href="./static/auth.css">
</head>
<body>

   <?php include 'nav.php'; require_once 'includes/edit-question-view.php'; ?>

   <div class="center" style="min-width: 75%; margin-top: 20px;">
      <h2>Edit Question</h2>  

      <?php render_form(); ?>
    </div>
    <style> 
        input {
            margin-right: 10px;
        }
    </style>
<script src="./scripts.js"></script>
</body>
</html>
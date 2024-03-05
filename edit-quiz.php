<?php
session_start();

if (!isset($_GET["quiz_id"])){
    header("Location: ../index.php");
    die();
}

require_once 'includes/quiz-view.php';

$quiz = get_quiz($pdo, $_GET["quiz_id"]);

if ($_SESSION["user"]["id"] !== $quiz["id"]) {
  header("Location: index.php");
  die();
}

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

   <?php include 'nav.php'; ?>

   <div class="center" style="min-width: 35%;">
      <h2>Edit Quiz</h2> 
      
      <?php display_error() ?>

      <form method="POST" action="<?php echo 'includes/edit-quiz-helper.php?quiz_id=' . $_GET["quiz_id"] . '' ?>">

      <?php 

        require_once 'includes/db.php';
        require_once 'includes/question_and_option_models.php';

        echo '<div class="txt_field">
                    <input type="text" value="' . $quiz["title"] . ' " required name="title">
                    <span></span>
                    <label>Title</label>
            </div>';

      echo '<div class="txt_field">
                <input type="number" value="' . $quiz["duration"] . '" min="5"  required name="duration">
                <span></span>
                <label>Duration (In minutes)</label>
            </div>';


      ?>

        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" value="Update Quiz">
        <br><br>
      </form>
    </div>
</body>
</html>
<?php 

if (!isset($_GET["quiz_id"])){
    header("Location: create_quiz.php");
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

   <div class="center" style="min-width: 75%; margin-top: 20px;">
      <h2>Add Question</h2>  

      <form method="POST" action="includes/question_and_option_helper.php">

        <div class="txt_field">
          <input type="text" required name="question">
          <span></span>
          <label>Question</label>
        </div>

        <?php 
        
        echo '<input type="text" name="quiz_id" value="' . $_GET['quiz_id'] . '" hidden>';

        ?>

        <div class="txt_field">
          <input type="text" required name="option1">
          <span></span>
          <label>Option 1</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="option2">
          <span></span>
          <label>Option 2</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="option3">
          <span></span>
          <label>Option 3</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="option4">
          <span></span>
          <label>Option 4</label>
        </div>
        Option 1 <input type="radio" name="correct_option" value="1" id="">
        Option 2 <input type="radio" name="correct_option" value="2" id="">
        Option 3 <input type="radio" name="correct_option" value="3" id="">
        Option 4 <input type="radio" name="correct_option" value="4" id="">
        <!-- <div class="pass">Forgot Password?</div> -->
        <br><br><input type="submit" value="Add question">
        <br><br>
      </form>
    </div>
    <style>
        input {
            margin-right: 10px;
        }
    </style>
<script src="./scripts.js"></script>
</body>
</html>
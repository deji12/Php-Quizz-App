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
      <h2>Create Quiz</h2>  

      <form method="POST" action="includes/quiz_helper.php">

        <div class="txt_field">
          <input type="text" required name="title">
          <span></span>
          <label>Title</label>
        </div>

        <div class="txt_field">
          <input type="number" min="5" required name="duration">
          <span></span>
          <label>Duration (In minutes)</label>
        </div>

        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" value="Create Quiz">
        <br><br>
      </form>
    </div>
    
<script src="./scripts.js"></script>
</body>
</html>
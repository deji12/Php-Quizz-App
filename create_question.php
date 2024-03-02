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

   <div class="center" style="min-width: 75%;">
      <h2>Create Quiz</h2>  

      <form method="POST" action="includes/login_helper.php">

        <div class="txt_field">
          <input type="text" required name="username">
          <span></span>
          <label>Title</label>
        </div>

        <div class="txt_field">
          <input type="number" required name="duration">
          <span></span>
          <label>Duration (In minutes)</label>
        </div>

        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
          <!-- <p>Forgot your Password? <a href="{% url 'reset_password' %}">Reset Password</a></p>  -->
        </div>
      </form>
    </div>
    
<script src="./scripts.js"></script>
</body>
</html>
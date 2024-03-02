<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/login_view.php';

session_start();

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Todo list | Login</title>
    <link rel="stylesheet" href="./static/auth.css">
  </head>
  <body>
    <div class="center">
      <h2>Login</h2>  

      <?php check_for_message(); ?>

      <form method="POST" action="includes/login_helper.php">

        <div class="txt_field">
          <input type="text" required name="username">
          <span></span>
          <label>Username</label>
        </div>

        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Password</label>
        </div>

        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
          <!-- <p>Forgot your Password? <a href="{% url 'reset_password' %}">Reset Password</a></p>  -->
        </div>
      </form>
    </div>

  </body>
</html>
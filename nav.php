<?php session_start(); ?>

<div class="nav">
    <?php echo '<p>' . $_SESSION["user"]["first_name"] . ' ' .  $_SESSION["user"]["last_name"] . '</p>'; ?>
    <ul>
        <li><a href="index.php">Quizzes</a></li>

        <?php

        if ($_SESSION["user"]["is_admin"]) {
            echo '<li><a href="create_quiz.php">Add Quiz</a></li>';
        } else {
            echo '<li><a href="#">Results</a></li>';
        }

        if (!isset($_SESSION["user"])){
            echo '<li><a href="login.php">Login</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
        } else {
            echo '<li><a href="includes/logout.php">Logout</a></li>';
        }


        ?>

    </ul>
</div>
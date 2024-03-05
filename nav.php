<?php

    require_once 'includes/validator.php';
    login_required();
    
?>

<div class="nav">
    <?php 
        echo '<p style="color: #638CB8;"><b>' . $_SESSION["user"]["username"] . '</b></p>';
        echo '<ul>';


            if ($_SESSION["user"]["is_admin"]) {
                // echo '<li><a href="index.php">Quizzes</a></li>';
                echo '<li><a href="my_quizzes.php">My Quizzes</a></li>';
                echo '<li><a href="create_quiz.php">Add Quiz</a></li>';
            } else {
                echo '<li><a href="index.php">Quizzes</a></li>';
                echo '<li><a href="result.php">Results</a></li>';
            }

            if (!isset($_SESSION["user"])){
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            } else {
                echo '<li><a href="logout.php">Logout</a></li>';
            }


        echo '</ul>';
    ?>
</div>
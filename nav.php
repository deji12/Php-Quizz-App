<div class="nav">
    <p>QUIZ MANIA</p>
    <ul>
        <li><a href="#">Quizzes</a></li>

        <?php 

        session_start();


        if ($_SESSION["user"]["is_admin"]) {
            echo '<li><a href="create_question.php">Add Quiz</a></li>';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/style.css">
</head>
<body>

    <div class="nav">
        <p>QUIZ MANIA</p>
        <ul>
            <li>Login</li>
            <li>Register</li>
            <li>Results</li>
            <li>Quizzes</li>
            <li>Logout</li>
        </ul>
    </div>

    <div class="container">
        <div class="question-body">
            <div class="info">
                <span>Quiz name</span>
                <span>Questions left</span>
            </div>
            
            <div class="question-content">
                <form action="" id="question_form">
                    <span id="error"> <br></span>
                    <span class="question">Question</span><br><br>
                    <div class="options">
                        <label>
                            <span><input type="radio" name="option" value="" id="option1"> Option 1</span>
                        </label>
                        <label>
                            <span><input type="radio" name="option" value="" id="option2"> Option 2</span>
                        </label>
                        <label>
                            <span><input type="radio" name="option" value="" id="option3"> Option 3</span>
                        </label>
                        <label>
                            <span><input type="radio" name="option" value="" id="option4"> Option 4</span>
                        </label>
                        
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
<script src="./scripts.js"></script>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        require_once 'db.php';
        require_once 'user_model.php';
        require_once 'validator.php';

        $validate_data = new LoginValidator($username, $password);

        $get_user = get_user($pdo, $username);

        if ($validate_data->validate($get_user)) {
            $_SESSION["user_id"] = $get_user["id"];
            $_SESSION["user_username"] = $get_user["username"];

            header("Location: ../index.php");
            die();
        }

    } catch (Exception $e){
        die("Error: " .$e->getMessage());
    }

} else {
    header("Location: ../login.php");
    die();
}
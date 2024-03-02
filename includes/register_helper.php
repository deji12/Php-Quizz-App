<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    try {

        require_once 'db.php';
        require_once 'user_model.php';
        require_once 'validator.php';

        $validate = new RegisterValidator($username, $password, $confirm_password, $email, $pdo);
        $validate->validate();

        create_user($pdo, $username, $first_name, $last_name, $email, $password);

        $_SESSION["signup_success"] = "Signup successful. Proceed to login";

        header("Location: ../login.php?signup=success");

        die();

    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    } 
} else {
    header("Location: ../register.php");
    die();
}
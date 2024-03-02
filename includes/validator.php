<?php

declare(strict_types=1);

class RegisterValidator {
    private $username;
    private $password;
    private $email;
    private $confirm_password;
    private $pdo;

    function __construct(string $_username, string $_password, string $_confrm_password, string $_email, object $_pdo) {
        $this->username = $_username;
        $this->password = $_password;
        $this->confirm_password = $_confrm_password;
        $this->email = $_email;
        $this->pdo = $_pdo;
    }

    function validate() {

        $errors = [];

        if (empty($this->username) || empty($this->password) || empty($this->confirm_password)){
            $errors["empty_input"] = "All fields must be filled!";
        }

        if ($this->password !== $this->confirm_password) {
            $errors["passwords_not_match"] = "Passwords do not match";
        }

        if (strlen($this->password) < 5) {
            $errors["less_than_5_characters"] = "Password must be at least 5 characters long";
        } 

        if (get_username($this->pdo, $this->username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (get_email($this->pdo, $this->email)) {
            $errors["email_taken"] = "Email already taken!";
        }

        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../register.php");
            die();
        }
    }

}

class LoginValidator{

    private $username;
    private $password;

    function __construct(string $_username, string $_password) {
        $this->username = $_username;
        $this->password = $_password;
    }

    function validate($user) {

        $errors = [];

        if (empty($this->username) || empty($this->password)) {
            $errors["empty_input"] = "Fill all fields";
        } 

        if (!$user) {
            $errors["invalid_username"] = "Invalid username entered";
        }

        if ($user && !password_verify($this->password, $user["pwd"])) {
            $errors["invalid_password"] = "Invalid password entered";
        }

        if ($errors) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../login.php");
            die();
        } else {
            return true;
        }
    }
}
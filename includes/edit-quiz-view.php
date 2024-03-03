<?php

function display_error(){
    if (isset($_SESSION["quiz_errors"])) {

        $errors = $_SESSION["quiz_errors"];

        echo '<br>';

        foreach ($errors as $error) {
            echo '<center><h4 style="color: firebrick;">' . $error . '</h4></center>';
        }

        unset($_SESSION["quiz_errors"]);
    }
}
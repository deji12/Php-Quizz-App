<?php

session_start();
session_unset();
session_destroy();

if (isset($_GET["action"]) && $_GET["action"] == "password_reset") {
    header("Location: login.php?action=password_reset");
    die();
}

header("Location: login.php");
die();
<?php

require("password.php"); // used for password hashing.
session_start();
unset($_SESSION['username']);
header("Location: home.php");
die();

function logout() {
        $_SESSION["username"] = null;
        $_SESSION["password"] = null;
        unset($_SESSION["username"]);
        loginRedirect();
}
function loginRedirect() {
    $_SESSION["valid-credentials"] = null;
    header("Location: home.php");
    exit;
}

?>
    
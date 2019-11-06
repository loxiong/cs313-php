<?php
/**********************************************************
* File: signout.php
* Author: Br. Burton
* 
* Description: Clears the username from the session if there.
*
***********************************************************
require("password.php"); // used for password hashing.
session_start();
unset($_SESSION['username']);
header("Location: signin.php");
die(); // we always include a die after redirects.
*/


function loginRedirect() {
        $_SESSION["valid-credentials"] = null;
        header("Location: index.php");
        exit;
    }
    function logout() {
        $_SESSION["user"] = null;
        $_SESSION["name"] = null;
        unset($_SESSION["user"]);
        loginRedirect();
    }
?>
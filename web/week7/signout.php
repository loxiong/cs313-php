<?php
/**********************************************************
* File: signout.php
* Author: Br. Burton
* 
* Description: Clears the username from the session if there.
*
***********************************************************/
require("password.php"); // used for password hashing.
session_start();
unset($_SESSION['username']);
header("Location: signin.php");
die(); // we always include a die after redirects.
?>
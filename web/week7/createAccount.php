<?php
/**********************************************************
* File: createAccount.php
* Author: Br. Burton
* 
* Description: Accepts a new username and password on the
*	POST variable, and creates it in the DB.
*
* The user is then redirected to the signIn.php page.
*
* CREATE TABLE week7_user (
    id          SERIAL PRIMARY KEY,
    username    VARCHAR(255) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL
);
*
***********************************************************/
// If you have an earlier version of PHP (earlier than 5.5)
// You need to download and include password.php.
// require("password.php");

// get the data from the POST
$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
if (!isset($username) || $username == ""
	|| !isset($password) || $password == "")
{
	header("Location: signup.php");
	die(); // we always include a die after redirects.
}

// sanitize input
$username = htmlspecialchars($username);
// Get the hashed password.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Connect to the database
require("dbconnect.php");
$db = get_db();
$query = 'INSERT INTO fakepeople (username, password) VALUES(:username, :password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
// **********************************************
// NOTICE: We are submitting the hashed password!
// **********************************************
$statement->bindValue(':password', $hashedPassword);
$statement->execute();
// finally, redirect them to the sign in page
header("Location: signin.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>
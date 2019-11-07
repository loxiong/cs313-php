<?php
/**********************************************************
* File: createAccount.php
* 
* Description: Accepts a new username and password on the
*	POST variable, and creates it in the DB.
*
* The user is then redirected to the signIn.php page.
*
* CREATE TABLE fakepeople (
    id          SERIAL PRIMARY KEY,
    username    VARCHAR(255) NOT NULL UNIQUE,
    password    VARCHAR(255) NOT NULL
);
*
***********************************************************/
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
// submitting hashed passwords
$statement->bindValue(':password', $hashedPassword);
$statement->execute();
// finally, redirect them to the sign in page
header("Location: signin.php");
die(); 
?>
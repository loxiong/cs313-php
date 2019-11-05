<?php
/**********************************************************
* File: signup.php
* Author: Br. Burton
* 
* Description: Allows a user to enter a new username
*   and password to add to the DB.
*
* It posts to a file called "createAccount.php"
*   which does the actual creation.
*
***********************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>

<body>
<div>

<h1>Sign up for new account</h1>

<form id="mainForm" action="createAccount.php" method="POST">

	<input type="text" id="username" name="username" placeholder="Username">
	<label for="username">Username</label>
	<br /><br />

	<input type="password" id="password" name="password" placeholder="password">
	<label for="password">Password</label>
	<br /><br />

	<input type="submit" value="Create Account" />

</form>


</div>

</body>
</html>


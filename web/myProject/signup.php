<?php
*
* (Nothing to enter here yet)
*
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <link href="css/styles.css" rel="stylesheet"> 
</head>

<body>
<div>

<h1>Sign up for new account</h1>

<form action="createAccount.php" method="POST">

	<input type="text" id="txtUser" name="txtUser" placeholder="Username">
	<label for="txtUser">Username</label>
	<br /><br />

	<input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
	<label for="txtPassword">Password</label>
	<br /><br />

	<input type="submit" class="button" value="Create Account" />

</form>


</div>

</body>
</html>


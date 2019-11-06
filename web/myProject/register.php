<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <meta name="description" content="Week 07 Project Continue - add users">
         
    <link href="css/styles.css" rel="stylesheet"> 
</head>

<body>
<div>

<h1>Sign up for new account</h1>

<form id="mainForm" action="register_to_user.php" method="POST">

	<label for="txtUser">Username</label>
    <input type="text" id="txtUser" name="txtUser" placeholder="Username">
	<br /><br />

	<label for="txtPassword">Password</label>
    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
	<br /><br />

	<input type="submit" value="Create Account" />

</form>


</div>

</body>
</html>
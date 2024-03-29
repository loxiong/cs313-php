<?php
/**********************************************************
* File: signin.php
* 
* Description: This page has a form for the user to sign in.
*
***********************************************************/
//require("password.php"); // used for password hashing.
session_start();
$badLogin = false;
// First check to see if we have post variables, if not, just
// continue on as always.
if (isset($_POST['txtUser']) && isset($_POST['txtPassword']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['txtUser'];
	$password = $_POST['txtPassword'];
	// Connect to the DB
	require("dbConnection.php");
	$db = get_db();
	$query = 'SELECT password FROM fakepeople WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['username'] = $username;
			header("Location: home.php");
			die(); // we always include a die after redirects.
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
    <link href="css/styles.css" rel="stylesheet">  
</head>

<body>
    <div>

        <?php
        if ($badLogin)
        {
            echo "Incorrect username or password!<br /><br />\n";
        }
        ?>

        <h1>Please sign in below:</h1>

        <form id="mainForm" action="signin.php" method="POST">

            <input type="text" id="txtUser" name="txtUser" placeholder="Username">
            <label for="txtUser">Username</label>
            <br /><br />

            <input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
            <label for="txtPassword">Password</label>
            <br /><br />

            <input type="submit" value="Sign In" />

        </form>

        <br /><br />

        Or <a href="signup.php">Sign up</a> for a new account.

    </div>

</body>
</html>
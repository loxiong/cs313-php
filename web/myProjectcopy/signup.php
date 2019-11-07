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
    <link href="css/styles.css" rel="stylesheet">  
</head>

<body>
    <div>

        <h1>Sign up for new account</h1>

        <form id="mainForm" action="createAccount.php" method="POST">

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


/**********************************************************
* File: index.php
* Description: This page has a form for the user to sign in.
***********************************************************
/
<?php
    session_start();
    require("login.php");
    $username = $_POST['username'];
	$password = $_POST['password'];
    require("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Database | Login</title>
        <link href="css/styles.css" rel="stylesheet">  
    </head>
        <body>
                <div>
                    <h1>Concession Planner</h1>
                    <form method="POST">
                    <span>Login</span>
                    <hr />
                    <table>
                    <?php if ($valid === false): ?>
                    <tr>
                        <td colspan="2">
                            <span style="color: #f00;">Invalid username or password</span>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" id="username" name="username" placeholder="Username"/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" id="password" name="password" placeholder="Password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="button" value="Sign In" formaction="login.php" />
                        </td>
                    </tr>
                    </table>
                        
                    <p>Or <a href="signup.php">Sign up</a> for a new account. </p>
                    </form>
                </div>
        </body>
</html>
<?php
    $_SESSION["valid-credentials"] = null;
    $valid = null;
?>
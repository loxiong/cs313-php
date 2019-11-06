<?php
/**********************************************************
* File: index.php (the sign in page)
* Description: This page has a form for the user to sign in.
***********************************************************/
    session_start();
    require("redirects.php");
    $user = $_SESSION["user"];
    $name = $_SESSION["name"];
    if (isset($user)) {
        loginSuccess($user, $name);
    }
    $valid = $_SESSION["valid-credentials"];
    if (isset($valid) || !empty($valid)) {
        $valid = htmlspecialchars(trim($valid));
        if ($valid === "false") {
            $valid = false;
        }
    } else {
        $valid = null;
    }
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
                        <td><input type="text" name="username" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="button" value="Log In" formaction="login.php" />
                        </td>
                    </tr>
                    </table>
                    </form>
                </div>
        </body>
</html>
<?php
    $_SESSION["valid-credentials"] = null;
    $valid = null;
?>
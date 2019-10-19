  
<?php
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
    </head>
    <body>
        <div class="u-container">

            <div class="u-content u-media-off">
                <div class="">
                    <form id="frm-main" method="POST">
                    <span class="u-heading-2">Login</span>
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
                        <td><input type="text" name="username" class="u-input-text" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" class="u-input-text" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="u-button u-fill" value="Log In" formaction="login.php" />
                        </td>
                    </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    $_SESSION["valid-credentials"] = null;
    $valid = null;
?>
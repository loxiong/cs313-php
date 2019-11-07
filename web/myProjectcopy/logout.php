<?php
function logout() {
        $_SESSION["username"] = null;
        $_SESSION["password"] = null;
        unset($_SESSION["username"]);
        loginRedirect();
}
function loginRedirect() {
    $_SESSION["valid-credentials"] = null;
    header("Location: home.php");
    exit;
}

?>


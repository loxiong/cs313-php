<?php
    session_start();
    require("redirects.php");
    require("dbConnect.php");
    // check to see if fields are populated
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    if (empty($username) || empty($password)) {
        loginFail();
    }
    // query database for login validity
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
    $table = "concession_user";
    $stmt = $db->prepare("SELECT * FROM $table WHERE username=:username AND password=:password");
    $stmt->execute(array(":username" => $username, ":password" => $password));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) === 0) {
        loginFail();
    }
    $name = $rows[0]["name"];
    loginSuccess($username, $name);
?>


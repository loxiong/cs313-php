<?php
/**********************************************************
* File: home.php
* Author: Br. Burton
* 
* Description: This is the home page. It checks that a user
*  exists on the session and redirects to the login page
*  if it does not.
***********************************************************/
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: signin.php");
	die(); // we always include a die after redirects.
}
require("dbconnect.php");
                
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
    <link href="css/styles.css" rel="stylesheet">   
</head>

<body>
    <div>
        <table>
            <tr>
                <span>Concession Summary</span>
                <a href="home.php"><div>Back</div></a>
                <a href="signout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />

        <h1>Welcome, <?= $username ?>!</h1>

        Please select the event to view:<br />
                
                
                <p><a href="event_form.php">Add New Event</a></p>
                <p><a href="item_new.php">Add New Concession Item</a></p>

        <a href="signout.php">Sign Out</a>
    </div>

</body>
</html>
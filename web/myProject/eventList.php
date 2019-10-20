<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS--------------->
<?php
session_start();
require("redirects.php");
require("dbconnect.php");
$user = $_SESSION["user"];
$name = $_SESSION["first_name"];
if (!isset($user)) {
    loginRedirect();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="My project event lists / view">        
        <title>Concession Item Details Page</title>
    </head>
    
    <body>
        <main>
            <h1>Manage Event and Details Page</h1>
            
            
            <p><a href="eventForm.php">Add Event</a></p>
        </main>
    </body>
    
</html>
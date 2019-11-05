<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS----------------
----Event Form-------------------->
<?php
session_start();
require("redirects.php");
$user = $_SESSION["user"];
$name = $_SESSION["first_name"];
if (!isset($user)) {
    loginRedirect();
}
require("dbconnect.php");
//$db = get_db();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Add event to database table">        
        <title>Event Form</title>
        <!--reset.css will remove all the browser's default styles-->
        <link href="css/reset.css" rel="stylesheet" type="text/css"> 
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    
    <body>
        <table>
            <tr>
                <span>Add New Event</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./logout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />
        
        <main>
            <h2>Enter New Event Information</h2>
            
            <form action="event_insert.php" method="POST">
                <label for="event_date">Event Date</label>
                <input type="text" name="event_date" id="event_date">
                <br /><br />
                
                <label for="event_name">Event Name</label>
                <input type="text" name="event_name" id="event_name">
                <br /><br />
               
                <label for="event_duration">Event Duration</label>
                <input type="text" name="event_duration" id="event_duration">
                <br /><br />
                
                <label for="event_participants">Event Participants</label>
                <input type="text" name="event_participants" id="event_participants">
                <br /><br />
                
                <input type="submit" class="button" value="Enter New Event" />
            </form>
            
        </main>
    </body>
    
</html>

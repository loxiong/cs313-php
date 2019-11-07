<?php
/* 
 * FILE: add new event
 */
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
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Add event to database table">        
        <title>Event Form</title>
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    
    <body>
        <table>
            <tr>
                <span>Add New Event</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./signout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />
        
        <main>
            <h2>Add Event</h2>
            
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

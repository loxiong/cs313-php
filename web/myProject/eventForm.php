<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS----------------
----Event Form-------------------->
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
        <meta name="description" content="Add event to database table">        
        <title>Scripture Database Form</title>
    </head>
    
    <body>
        <main>
            <h2>Add Event</h2>
            <!--<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">-->
            <form action="home.php" method="post">
                <label for="event_name">Event Name</label>
                <input type="text" name="event_name" id="event_name" />
                <br /><br />
                
                <label for="event_date">Event Date</label>
                <input type="text" name="event_date" id="event_date" />
                <br /><br />
               
                <label for="event_duration">Event Duration</label>
                <input type="text" name="event_duration" id="event_duration" />
                <br /><br />
                
                <label for="event_participants">Event Participants</label>
                <input type="text" name="event_participants" id="event_participants" />
                <br /><br />
                
                <input type="submit" value="Submit" />
            </form>
            
            <?php
            $statement = $db->prepare("INSERT INTO event (event_name, event_date, event_duration, event_participants) 
                VALUES ('$_POST[event_name]','$_POST[event_date]','$_POST[event_duration]','$_POST[event_participants]')");
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                $name = $row['event_name'];
                $date = $row['event_date'];
                $duration = $row['event_duration'];
                $participants = $row['event_participants'];
                echo "<p>$name $date / $duration days / $participants <p>";
            }
            ?>
            
        </main>
    </body>
    
</html>

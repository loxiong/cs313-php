<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS--------------->
<?php
require("dbconnect.php");
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
            <?php
            //Prepare the statements
            //$stmt = $db->prepare("SELECT event_name FROM event");
            //$stmt->execute();
            // Go through each result
            //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                //$event_name = $row['event_name'];
                //$event_date = $row['event_date'];
                //echo "<p><a href="eventDetails.php">$event_name</a></p>";
            //}
            ?>
            
            
            
            <p><a href="eventForm.php">Add Event</a></p>
        </main>
    </body>
    
</html>
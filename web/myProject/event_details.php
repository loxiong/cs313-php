<!--This page will include a detailed view of an event
--including the event name, event date, and a list of concession items
--the concession list for the event will include the item name, quantity and price
--ideally include a total cost for the event
--maybe have to join tables event and item?? -->
<!--as of 10/19/19 5:21 PM the event detail page successfully returned the event_id that matches from the home.php page, but I want the event detail page to show more than just this id. How do I do that?--> 
<?php
    session_start();
    require("redirects.php");
    require('dbconnect.php');
    $user = $_SESSION["user"];
    if (!isset($user)) {
        loginRedirect();
    }
    $event = htmlspecialchars(trim($_POST["event_id"]));
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Event Details</title>
        
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    <body>
        
        <table>
            <tr>
                <span>View Event Details</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./logout.php"><div>Logout</div></a>
            </tr>
        </table>
        
        <div>
            <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_id=:event_id");
                $stmt->execute(array(":event_id" => $event));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            ?>
            
            Information about the selected event:
            <?php else: ?>
            <?php
                foreach ($rows as $row):
                    $name = $row["event_name"]; 
                    $date = $row["event_date"];
                    $eventdur = $row["event_duration"];
                    $people = $row["event_participants"];
            ?>
                <h1><?php echo ($name); ?></h1>
                <h2><?php echo ($date); ?></h2>
                <p>Event Duration: <?php echo ($eventdur); ?> days</p>
                <p>Estimated Number of Participants: <?php echo ($people); ?> swimmers</p>
                <h2>Concession Menu</h2>
                <p>TO DO: Concession Menu will populate here with the option to add/delete items.</p>
                
            
        
    
            <?php endforeach; ?>
            
            <?php endif; ?>
            
            <p><a href="item_details.php">See All Concesssion Items</a></p>
        </div>
    </body>
</html>
<?php
/* 
 * FILE: all event details
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
$event = htmlspecialchars(trim($_POST["event_id"]));
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Event Details</title>
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    <body>
        <div>
            <span>View Events</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./signout.php"><div>Logout</div></a>
            <hr />
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
            <hr />
            
            <h2>Concession Menu</h2>
            <p>TO DO: Concession Menu will populate here with the option to add/delete items.</p>
            <?php
            //Prepare the statements
            $statement = $db->prepare("SELECT item_id, event_id FROM item_event");
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $item_name = $row['item_name'];
                $item_desc = $row['item_desc'];
                $item_qty = $row['item_qty'];
                $item_price = $row['item_price'];
                $category_id = $row['category_id'];
                echo "<p><strong>$item_name - </strong> $item_desc / $item_qty / $$item_price </p>";
            }
            ?>
            <hr />
            
            <p><a href="item_details.php">See All Concesssion Items</a></p>
            
        
    
            <?php endforeach; ?>
            
            <?php endif; ?>
        </div>
    </body>
</html>
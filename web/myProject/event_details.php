<?php
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
<html lang="en-US">
    <head>
        <title>Event Details</title>
        <!--reset.css will remove all the browser's default styles-->
        <link href="css/reset.css" rel="stylesheet" type="text/css"> 
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
        <hr />
        
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
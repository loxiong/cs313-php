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
    //$assign = htmlspecialchars(trim($_POST["assign-id"]));
    $event = htmlspecialchars(trim($_POST["event_id"]));
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Database | Home</title>
    </head>
    <body>
        <div>
            <span>View Event</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./logout.php"><div>Logout</div></a>
            <hr />
            <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_id=:event_id");
                $stmt->execute(array(":event_id" => $event, ":event_name" => $event_name));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            ?>
            <?php else: ?>
            <?php
                foreach ($rows as $row):
                    $name = $row["event_id"]; 
                    $eventname = $row["event_name"];
            ?>
                <?php echo $name - $eventname; ?>
    
                
            <?php endforeach; ?>
            
            <?php endif; ?>
        </div>
    </body>
</html>
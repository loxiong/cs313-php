<!--This page will include a detailed view of an event
--including the event name, event date, and a list of concession items
--the concession list for the event will include the item name, quantity and price
--ideally include a total cost for the event
--maybe have to join tables event and item?? -->
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
                <a href="./home.php"><div class="u-button">Back</div></a>
                <a href="./logout.php"><div class="u-button">Logout</div></a>
            <hr />
            <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_name=:event_name");
                $stmt->execute(array(":event_name" => $event));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            ?>
            <?php else: ?>
            <?php
                foreach ($rows as $row):
                    $name = $row["event_name"];
            ?>
                <?php echo($name); ?>
                
            <?php endforeach; ?>
            
            <?php endif; ?>
        </div>
    </body>
</html>
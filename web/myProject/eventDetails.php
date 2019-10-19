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
            <div>
            <table>
            <tr>
                <td><span>View Event</span><td>
                <td>
                    <a href="./home.php"><div class="u-button">Back</div></a>
                    <a href="./logout.php"><div class="u-button">Logout</div></a>
                </td>
            </tr>
            </table>
            <hr />
            <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_name=:event_name");
                $stmt->execute(array(":event_name" => $event));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            ?>
            <?php else: ?>
            <table>
                <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Duration</th>
                    <th>Number of Participants</th>
                </tr>
            <?php
                foreach ($rows as $row):
                    $id = $row["event_id"];
                    $name = $row["event_name"];
                    $desc = $row["event_date"];
                    $dur = $row["event_duration"];
                    $preempt = $row["event_participants"];
            ?>
                <tr>
                    <td><?php echo($name); ?></td>
                </tr>
                
            <?php endforeach; ?>
            </table>
            <?php endif; ?>
            </div>
        </div>
    </body>
</html>
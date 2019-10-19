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
        <div class="u-container">
            <div class="u-content u-media-off">
            <table class="u-fill">
            <tr>
                <td><span class="u-heading-2">View Event</span><td>
                <td class="u-right-text">
                    <a href="./home.php"><div class="u-button">Back</div></a>
                    <a href="./logout.php"><div class="u-button">Logout</div></a>
                </td>
            </tr>
            </table>
            <hr />
            <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE assignment=:event");
                $stmt->execute(array(":event_name" => $event_name));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            ?>
                The selected assignment currently has no tasks.
            <?php else: ?>
            <table class="u-left-text u-fill">
                <tr>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Duration</th>
                    <th>Number of Participants</th>
                    <th>Required?</th>
                    <th>Status</th>
                </tr>
            <?php
                foreach ($rows as $row):
                    $id = $row["id"];
                    $name = $row["event_name"];
                    $desc = $row["event_date"];
                    $dur = $row["event_duration"];
                    $preempt = $row["event_participants"];
            ?>
                <tr>
                    <td><?php echo($name); ?></td>
                    <td><?php
                        if (!empty($desc)) {
                            echo($desc);
                        } else {
                            echo("NULL");
                        }
                    ?></td>
                    <td><?php echo($dur); ?></td>
                    <td><?php echo($stat); ?></td>
                </tr>
            <?php endforeach; ?>
            </table>
            <?php endif; ?>
            </div>
        </div>
    </body>
</html>
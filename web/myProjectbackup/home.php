<?php
/**********************************************************
* File: home.php
* Description: This is the home page. It checks that a user
*  exists on the session and redirects to the login page
*  if it does not.
***********************************************************/
session_start();
require("redirects.php");
require("dbconnect.php");
$user = $_SESSION["user"];
$name = $_SESSION["username"];
if (!isset($user)) {
    loginRedirect();
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Database | Home</title>
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    <body>
        <div>

            <div>
                <span>Concession Summary</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./logout.php"><div>Logout</div></a>
                <hr />
                
                Welcome! <?php echo($name); ?>!<br />
                Please select the event to view:<br />
                <table>
                <?php
                    $query = "SELECT * FROM event";
                    foreach ($db->query($query) as $row):
                        $id = $row["event_id"];
                        $name = $row["event_name"];
                        $date = $row["event_date"];
                ?>
                    <tr>
                    <form method="POST">
                        <td style="display: none;">
                            <input type="text" name="event_id" value="<?php echo($id); ?>" readonly />
                        </td>
                        <td><button type="submit" class="button" formaction="event_details.php">View Details</button></td>
                        <td><button type="submit" class="button" formaction="item_to_event.php">Create Menu</button></td>
                        <td><?php echo($name); ?></td>
                    </form>
                    </tr>
                <?php endforeach; ?>
                </table>
                <hr />
                
                <p><a href="event_form.php">Add New Event</a></p>
                <p><a href="item_new.php">Add New Concession Item</a></p>
                
            </div>
        </div>
    </body>
</html>
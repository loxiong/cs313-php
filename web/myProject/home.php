<?php
/**********************************************************
* File: home.php
* Description: This is the home page. It checks that a user
*  exists on the session and redirects to the login page
*  if it does not.
***********************************************************/
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: index.php");
	die(); // we always include a die after redirects.
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Summary | Home</title>
        <!--reset.css will remove all the browser's default styles-->
        <link href="css/reset.css" rel="stylesheet" type="text/css">
        <link href="css/styles.css" rel="stylesheet"> 
    </head>
    <body>
        <div>

            <div>
                <table>
                <tr>
                    <td><span>Concession Summary</span><td>
                    <td>
                        <a href="./logout.php"><div>Logout</div></a>
                    </td>
                </tr>
                </table>
                <hr />
                
                Welcome, <?= $username ?>!<br />
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
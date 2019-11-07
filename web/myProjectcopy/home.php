<?php
/**********************************************************
* File: home.php
* 
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
	header("Location: signin.php");
	die(); // we always include a die after redirects.
}
require("dbconnect.php");          
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
    <link href="css/styles.css" rel="stylesheet">   
</head>

<body>
    <div>
        <table>
            <tr>
                <span>Concession Summary</span>
                <a href="home.php"><div>Back</div></a>
                <a href="signout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />

        <h1>Welcome, <?= $username ?>!</h1>

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
                
        <p><a href="item_to_event.php"><strong>Create a Menu</strong></a></p>       
        <p><a href="event_form.php">Add New Event</a></p>
        <p><a href="item_new.php">Add New Concession Item</a></p>

    </div>

</body>
</html>
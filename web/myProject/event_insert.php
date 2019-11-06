<!--this page receives the new entered event
-- takes input POSTED from event_form.php
-- enters a new event into the database
-- This file does NOT do any rendering at all,
-- instead it redirects the user to final_scripture.php to see the resulting list.
-->
<?
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
//$db = get_db();

// get the data from the POST
$event_date = $_POST['event_date'];
$event_name = $_POST['event_name'];
$event_duration = $_POST['event_duration'];
$event_participants = $_POST['event_participants'];
            
try
{
	// Add the event
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO event (event_date, event_name, event_duration, event_participants) VALUES(:event_date, :event_name, :event_duration, :event_participants)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':event_date', $event_date);
	$statement->bindValue(':event_name', $event_name);
	$statement->bindValue(':event_duration', $event_duration);
	$statement->bindValue(':event_participants', $event_participants);
	$statement->execute();
	// get the new id
	$event_id = $db->lastInsertId("event_event_id_seq");
} 
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: home.php");
die(); 
?>
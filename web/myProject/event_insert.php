<!--this page receives the new entered event
-- takes input POSTED from event_form.php
-- enters a new event into the database
-- This file does NOT do any rendering at all,
-- instead it redirects the user to final_scripture.php to see the resulting list.
-->
<?
// get the data from the POST
$event_name = $_POST['event_name'];
$event_date = $_POST['event_date'];
$event_duration = $_POST['event_duration'];
$event_participants = $_POST['event_participants'];
            
require('dbconnect.php');
$db = get_db();
try
{
	// Add the event
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO event (event_name, event_date, event_duration, event_participants) VALUES(:event_name, :event_date, :event_duration, :event_participants)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':event_name', $event_name);
	$statement->bindValue(':event_date', $event_date);
	$statement->bindValue(':event_duration', $event_duration);
	$statement->bindValue(':event_participants', $event_participants);
	$statement->execute();
	// get the new id
	$event_id = $db->lastInsertId("event_id_seq");
} 
catch (Exception $ex)
{
	echo "Error with DB. Details: $ex";
	die();
}
header("Location: home.php");
die(); 
?>
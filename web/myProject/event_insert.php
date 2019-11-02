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
            
require('dbConnect.php');
$db = get_db();
try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO event (event_name, event_date, event_duration, event_participants) VALUES(:name, :date, :duration, :participants)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':name', $event_name);
	$statement->bindValue(':date', $event_date);
	$statement->bindValue(':duration', $event_duration);
	$statement->bindValue(':participants', $event_participants);
	$statement->execute();
	// get the new id
	$event_id = $db->lastInsertId("event_id_seq");
} 
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
// finally, redirect user to a scripture.php page to see all the scripture listings
header("Location: home.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>
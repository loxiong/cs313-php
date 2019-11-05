<!--this page receives the new entered scripture
-- Takes input POSTED from new_scripture.php
-- FROM Instructor's Solution:
-- This file enters a new scripture into the database along with the selected topic.
-- This file does NOT do any rendering at all,
-- instead it redirects the user to final_scripture.php to see the resulting list.
-->
<?
// get the data from the POST
$event_ids = $_POST['checkboxE'];
$item_ids = $_POST['checkboxSt'];

session_start();
require("redirects.php");
$user = $_SESSION["user"];
$name = $_SESSION["first_name"];
if (!isset($user)) {
    loginRedirect();
}
require('dbconnect.php');
//$db = get_db();
try
{
	// Now go through each category id in the list from the user's checkboxes
	foreach ($event_ids as $event_id)
	{
		echo "item_id: $item_id, event_id: $event_id";
		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO item_event(item_id, event_id) VALUES(:item_id, :event_id)');
		// Then, bind the values
		$statement->bindValue(':item_id', $item_id);
		$statement->bindValue(':event_id', $event_id);
		$statement->execute();
	}
} 
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}
// finally, redirect user to a itemList.php page to see all the item listings
header("Location: event_details.php");
die(); 
?>


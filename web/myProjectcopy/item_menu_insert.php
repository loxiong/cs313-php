<?
/*
 * FILE: create menu
 * information gets passed through this file
 */
// get the data from the POST
$item_name = $_POST['item_name'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$event_ids = $_POST['checkboxE'];
$item_ids = $_POST['checkboxI'];

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
//connect to the database
require("dbconnect.php");  

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
header("Location: view_menu.php");
die(); 
?>
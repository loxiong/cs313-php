<?
/* 
 * FILE: To create a relationship between selected items to an event
 * Purpose: to create a menu for a specific event
 * Many-to-many relationship table: item_event
 *
 */
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
$event_id = $_POST['event_id'];
$event_date = $_POST['event_date'];
$event_name = $_POST['event_name'];
$event_duration = $_POST['event_duration'];
$event_participants = $_POST['event_participants'];

// get the data from the POST
$item_name = $_POST['item_name'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$item_ids = $_POST['checkboxI'];
$event_ids = $_POST['checkboxSt'];


$idItem = $rows['item_id'];
$nameItem = $rows['item_name'];
// make the value of the checkbox to be the id of the label
echo "<input type='checkbox' name='checkboxI[]' id='checkboxI$idItem' value='$idItem'>";
// Create unique id by using "checkbox" followed by the id, so that it becomes something like
// "checkbox1" and "checkbox2", etc.
echo "<label for='checkboxI$idItem'>$nameItem</label><br />";
// put a newline out there just to make our "view source" experience better
echo "\n";


try
{
	// Go through each item id in the list from the user's checkboxes
	foreach ($item_ids as $item_id)
	{
		echo "item_id: $item_id, event_id: $event_id";
		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO item_event(item_id, event_id) VALUES(:item_id, :event_id)');
		// Then, bind the values
		$statement->bindValue(':item_id', $item_id);
		$statement->bindValue(':event_id', $category_id);
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
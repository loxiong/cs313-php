<!--this page receives the new entered scripture
-- Takes input POSTED from new_scripture.php
-- FROM Instructor's Solution:
-- This file enters a new scripture into the database along with the selected topic.
-- This file does NOT do any rendering at all,
-- instead it redirects the user to final_scripture.php to see the resulting list.
-->
<?
// get the data from the POST
$item_name = $_POST['item_name'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$category_ids = $_POST['checkboxCat'];
$store_ids = $_POST['checkboxSt'];

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
	// Add the item
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO item(item_name, item_desc, item_price, item_qty) VALUES(:item_name, :item_desc, :item_price, :item_qty)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':item_name', $item_name);
	$statement->bindValue(':item_desc', $description);
	$statement->bindValue(':item_price', $price);
	$statement->bindValue(':item_qty', $quantity);
	$statement->execute();
	// get the new id
	$item_id = $db->lastInsertId("item_item_id_seq");
	// Now go through each category id in the list from the user's checkboxes
	foreach ($category_ids as $category_id)
	{
		echo "item_id: $item_id, category_id: $category_id";
		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO item_category(item_id, category_id) VALUES(:item_id, :category_id)');
		// Then, bind the values
		$statement->bindValue(':item_id', $item_id);
		$statement->bindValue(':category_id', $category_id);
		$statement->execute();
	}
    // Now go through each store id in the list from the user's checkboxes
	foreach ($store_ids as $store_id)
	{
		echo "item_id: $item_id, store_id: $store_id";
		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO item_store(item_id, store_id) VALUES(:item_id, :store_id)');
		// Then, bind the values
		$statement->bindValue(':item_id', $item_id);
		$statement->bindValue(':store_id', $store_id);
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
header("Location: item_details.php");
die(); 
?>
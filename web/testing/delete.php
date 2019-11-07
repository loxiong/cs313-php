<?php
// require('dbConnect.php');
// define the variable that was created on the scripture.php page in the link
// $scripture_id = $_GET['scriptures_id'];
// can wrap it in an isset to make in more interesting
if (!isset($_GET['scriptures_id']))
{
    die("Error: scripture id not specified...");
}
// sanitize the id
$scriptures_id = htmlspecialchars($_GET['scriptures_id']); //add htmlspecialchars to check the integrity of the data

require('dbConnect.php');
$db = get_db();

$stmt = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
$stmt->bindValue(':id', $scriptures_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$script_book=$rows[0]['book'];

//Define the query
$query = "DELETE FROM scriptures WHERE name={$_POST['content']} LIMIT 1";

//sends the query to delete the entry
mysql_query ($query);

if (mysql_affected_rows() == 1) { 
//if it updated
?>

            <strong>Contact Has Been Deleted</strong><br /><br />

<?php
 } else { 
//if it failed
?>

            <strong>Deletion Failed</strong><br /><br />


<?php
} 
?>
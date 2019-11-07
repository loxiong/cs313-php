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

//$stmt = $db->prepare('SELECT * FROM scriptures WHERE content=:content');
//$stmt->bindValue(':content', $content, PDO::PARAM_INT);
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$script_book=$rows[0]['book'];

//Define the query
$stmt = $db->prepare('DELETE FROM scriptures WHERE WHERE id=:id');
$stmt->bindValue(':id', $scriptures_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//sends the query to delete the entry

if ($rows() == 1) { 

            echo <strong>Contact Has Been Deleted</strong><br /><br />
 } else { 
//if it failed

            <strong>Deletion Failed</strong><br /><br />

} 
?>
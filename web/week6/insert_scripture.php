<!--this page receives the new entered scripture
-- Takes input POSTED from new_scripture.php
-- FROM Instructor's Solution:
-- This file enters a new scripture into the database along with the selected topic.
-- This file does NOT do any rendering at all,
-- instead it redirects the user to final_scripture.php to see the resulting list.
-->
<?
// get the data from the POST
$book = $_POST['book'];
$chapter = $_POST['chapter'];
$verse = $_POST['verse'];
$content = $_POST['content'];
$topic_ids = $_POST['checkbox'];

require('dbConnect.php');
$db = get_db();
try
{
	// Add the Scripture
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO scriptures(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)';
	$statement = $db->prepare($query);
	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':book', $book);
	$statement->bindValue(':chapter', $chapter);
	$statement->bindValue(':verse', $verse);
	$statement->bindValue(':content', $content);
	$statement->execute();
	// get the new id
	$scriptures_id = $db->lastInsertId("scriptures_id_seq");
	// Now go through each topic id in the list from the user's checkboxes
	foreach ($topic_ids as $topic_id)
	{
		echo "scriptures_id: $scriptures_id, topic_id: $topic_id";
		// Again, first prepare the statement
		$statement = $db->prepare('INSERT INTO scripture_topic(scriptures_id, topic_id) VALUES(:scriptures_id, :topic_id)');
		// Then, bind the values
		$statement->bindValue(':scriptures_id', $scriptures_id);
		$statement->bindValue(':topic_id', $topic_id);
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
// finally, redirect user to a scripture.php page to see all the scripture listings
header("Location: scripture.php");
die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.
?>
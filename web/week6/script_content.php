<!--modeled after PHP Passing Data and Where -- video notes 
// How to send data from one PHP page to another?
// Information can come from part of a REQUEST to the other page 
// GET request to retrieve data (to get things)
// POST request is used when you want to change thinngs in a certain way
// the goal is to get in the URL to show "../scripture.php?scriptures_id=1"
// So we will use the table column id to get and point to the content we need
// To achieve this, go back to the scripture.php page and make the echo a link-->
<?php
//require('dbConnect.php');
// define the variable that was created on the scripture.php page in the link
// $scripture_id = $_GET['scriptures_id'];
// can wrap it in an isset to make in more interesting
if (!isset($_GET['scriptures_id']))
{
    die("Error: scripture id not specified...");
}
$scriptures_id = htmlspecialchars($_GET['scriptures_id']); //add htmlspecialchars to check the integrity of the data

require('dbConnect.php');
$db = get_db();
$stmt = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
$stmt->bindValue(':id', $scriptures_id, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$script_book=$rows[0]['book'];
$script_chapter=$rows[0]['chapter'];
$script_verse=$rows[0]['verse'];

/*$query = 'SELECT id, book, chapter, verse, content FROM scriptures';
$stmt = $db->prepare($query);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
/*
SELECT a.chapter AS chapter1, b.verse AS verse1, a.book
FROM scriptures A INNER JOIN scriptures B
ON a.scripture_id = b.id WHERE b.id =:id
*/
/*
$stmt = $db->prepare('SELECT s1.book, s1.chapter AS chapter1, s2.verse AS verse1
FROM scriptures s1 INNER JOIN scriptures s2
ON s1.scriptures_id = s2.id WHERE s2.id =:id');
$stmt->bindValue(':id', $scriptures_id, PDO::PARAM_INT));
$stmt->execute();
$content_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/
//$scriptures_book = $content_rows[0]['book'];
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>CS 313 Week 06 Reading</title>
        <meta name="description" content="Week 06 Reading Activity">
    </head>
    
    <body>
        <header>      
            
        </header>    
        
        <main>
            <h1>Scripture Content <?php echo $scriptures_id; ?></h1>
            <h1>Scripture Content for 
                <?php 
                echo $script_chapter; ?></h1>
            
            <p>
                <?php
            $id = htmlspecialchars($_GET["scriptures_id"]);
            $row = ($db->query("SELECT * FROM scriptures WHERE id='$id'"))[0];
            $book = $row["book"];
            $chapter = $row["chapter"];
            $verse = $row["verse"];
            $content = $row["content"];
            echo("$book $chapter:$verse &ldquo;$content&rdquo;");
                ?>
            </p>
        </main>
    
    </body>
</html>
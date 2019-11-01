<!--modeled after PHP Passing Data and Where -- video notes 
// Second Attempt
// This page receives information from the scripture.php
// It displays information based on the scriptures_id
// Here, I replaced the scripture id in the <h1> with the scripture book name
-->
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
            
            <h1>Scripture Content for <?php echo $script_book; ?></h1>
            
            <ul style="list-style-type:none">
            <?php
            foreach ($rows as $row)
            {
                $chapter = $row['chapter'];
                $verse = $row['verse'];
                $content = $row['content'];
                echo "<h2>Chapter $chapter, Verse $verse</h2>";
                echo "<p>$content</p>";
            }
            ?>
            </ul>

        </main>
    
    </body>
</html>
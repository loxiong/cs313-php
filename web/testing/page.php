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
                echo "<p>";
                echo $content;
                // get the topics now for this scripture
                echo '<br />';
                echo '<br />';
                echo '<i>Topic: </i>';
                $stmtTopics = $db->prepare(
                    'SELECT name 
                     FROM topic t' . ' 
                     INNER JOIN scripture_topic st ON st.topic_id = t.id' . ' 
                     WHERE st.scriptures_id = :scriptures_id');
                $stmtTopics->bindValue(':scriptures_id', $row['id']);
                $stmtTopics->execute();
                // Go through each topic in the result
                while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
                {
                    echo $topicRow['name'] . ' ';
                }
                echo "</p>";
            }
            ?>
            </ul>
            <div>
                <form action='delete.php?scriptures_id=$id' method="post">
                    <input type="hidden" name="name" value="'scriptures_id=$id'">
                    <input type="submit" name="submit" value="Delete">
                </form>
            </div>
            
            
       

        </main>
    
    </body>
</html>
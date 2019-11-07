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

$id = $_GET['scriptures_id'];
//echo $id;

//$stmt = $db->prepare('SELECT * FROM scriptures WHERE content=:content');
//$stmt->bindValue(':content', $content, PDO::PARAM_INT);
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$script_book=$rows[0]['book'];

//Define the query
$stmt = $db->prepare('DELETE FROM scriptures WHERE id=:id');
$stmt->bindValue(':id', $scriptures_id, PDO::PARAM_INT);
$stmt->execute();
return $stmt->rowCount();

header("Location: index.php");
die();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>CS 313 Week 06 Reading</title>
        <meta name="description" content="testing delete">
    </head>
    
    <body>
        <header>      
            
        </header>    
        
        <main>
            <?php
            try {
                $stmt = $db->prepare('DELETE FROM scriptures WHERE id=:id');
                $stmt->bindValue(':id', $scriptures_id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->execute();
                echo 'The number of row(s) deleted: ' . $result . '<br>';

            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
            ?>
 
        </main>
    
    </body>
</html>
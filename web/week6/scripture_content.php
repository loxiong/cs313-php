<!--modeled after PHP Passing Data and Where -- video notes 
// First Attempt
// This page receives information from the scripture.php
// It displays information based on the scriptures_id -->
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
            <h1>Scripture Content <?php echo $scriptures_id ?></h1>
        </header>    
        
        <main>
            <p>Notes</p>
        </main>
    
    </body>
</html>
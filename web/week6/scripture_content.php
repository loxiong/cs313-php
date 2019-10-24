<!--modeled after PHP Passing Data and Where -- video notes 
// How to send data from one PHP page to another?
// Information can come from part of a REQUEST to the other page 
// GET request to retrieve data (to get things)
// POST request is used when you want to change thinngs in a certain way
// the goal is to get in the URL to show "../scripture.php?scriptures_id=1"
// So we will use the table column id to get and point to the content we need
// To achieve this, go back to the scripture.php page and make the echo a link-->
<?php
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
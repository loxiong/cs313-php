<?php
/* 
 * FILE: all items and details
 */
session_start();
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: signin.php");
	die(); // we always include a die after redirects.
}
require("dbconnect.php");  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Week 5 Team Activity">        
        <title>Concession Item Details Page</title>
        
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    
    <body>
        
        <table>
            <tr>
                <span>List of All Concession Items</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./signout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />
        
        <main>
            <h1>Concession Item Details Page</h1>
            <?php
                $stmt = $db->prepare("SELECT * FROM event WHERE event_id=:event_id");
                $stmt->execute(array(":event_id" => $event));
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($rows) === 0):
            ?>
            
            <?php
                foreach ($rows as $row):
                    $name = $row["event_name"]; 
                    $date = $row["event_date"];
                    $eventdur = $row["event_duration"];
                    $people = $row["event_participants"];
            ?>
            <h1><?php echo ($name); ?></h1>
            <h2><?php echo ($date); ?></h2>
            
            <?php
            //Prepare the statements
            $statement = $db->prepare("SELECT * FROM item WHERE item_id=:item:id");
            $statement->execute(array("event_id" => $item));
            $results = $statement->fetch(PDO::FETCH_ASSOC));
            if (count($results) === 0):
            ?>
            <?php
            {
                foreach ($results as $result):
                    $item_name = $row['item_name'];
                    $item_desc = $row['item_desc'];
                    $item_qty = $row['item_qty'];
                    $item_price = $row['item_price'];
                    $category_id = $row['category_id'];
                echo "<ul><li><strong>$item_name - </strong> $item_desc / $item_qty / $$item_price </li></ul>";
            }
            ?>
            
            <h3><a href="home.php">Return To "Concession Summary"</a></h3>
        </main>
    </body>
    
</html>

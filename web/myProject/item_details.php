<!------PHP data/Content Detailes--------------->
<?php
session_start();
require("redirects.php");
$user = $_SESSION["user"];
$name = $_SESSION["first_name"];
if (!isset($user)) {
    loginRedirect();
}
require("dbconnect.php");
//$db = get_db();
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
                <a href="./logout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />
        
        <main>
            <h1>Concession Item Details Page</h1>
            <?php
            //Prepare the statements
            $statement = $db->prepare("SELECT item_name, item_desc, item_qty, item_price FROM item");
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $item_name = $row['item_name'];
                $item_desc = $row['item_desc'];
                $item_qty = $row['item_qty'];
                $item_price = $row['item_price'];
                $category_id = $row['category_id'];
                echo "<p><strong>$item_name - </strong> $item_desc / $item_qty / $$item_price </p>";
            }
            ?>
            
            <h3><a href="home.php">Return To "Concession Summary"</a></h3>
        </main>
    </body>
    
</html>

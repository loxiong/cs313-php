<!--WEEK 05 - SCRIPTURE TABLE PHP QUERIES - TEAM ACTIVITY-->
<?php
//PDO CONNECTION
try
{
  $dbUrl = getenv('DATABASE_URL');
  $dbOpts = parse_url($dbUrl);
  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Week 5 Team Activity">        
        <title>Concession Item Details Page</title>
    </head>
    
    <body>
        <main>
            <h1>Concession Item Details Page</h1>
            <?php
            //Prepare the statements
            $statement = $db->prepare("SELECT item_name, item_desc, item_qty, item_price, category_id, store_id FROM item");
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
                echo "<p><strong>$item_name - </strong> $item_desc, $item_price <p>";
            }
            ?>
        </main>
    </body>
    
</html>
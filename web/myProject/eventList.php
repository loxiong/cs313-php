<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS--------------->
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
        <meta name="description" content="My project event lists / view">        
        <title>Concession Item Details Page</title>
    </head>
    
    <body>
        <main>
            <h1>Manage Event and Details Page</h1>
            <?php
            //Prepare the statements
            $statement = $db->prepare("SELECT event_name, event_date FROM event");
            $statement->execute();
            // Go through each result
            foreach ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $event_name = $row['event_name'];
                $event_date = $row['event_date'];
                echo "<p><a href="eventDetails.php"><strong>$event_date - </strong> $event_name</a></p>";
            }
            ?>
        </main>
    </body>
    
</html>
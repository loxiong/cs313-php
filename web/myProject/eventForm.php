<!--WEEK 05 - INDIVIDUAL ASSIGNMENT
----PHP DATA ACCESS----------------
----Event Form-------------------->
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
        <meta name="description" content="Add event to database table">        
        <title>Scripture Database Form</title>
    </head>
    
    <body>
        <main>
            <h2>Add Event</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
               <label for="event_name">Event Name</label>
                    <input type="text" name="event_name" id="event_name" />
               <label for="event_date">Event Date</label>
                    <input type="text" name="event_date" id="event_date" />
               <input type="submit" value="Submit" />
            </form>
            <?php
            //$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=myadmin123");
            $statement = $db->prepare("INSERT INTO event (event_name, event_date) 
                VALUES ('$_POST[event_name]','$_POST[event_date]')");
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $event_name = $row['event_name'];
                $event_date = $row['event_date'];
                echo "<p><strong>$event_date </strong> - \"$event_name\"<p>";
            }
            ?>
        </main>
    </body>
    
</html>

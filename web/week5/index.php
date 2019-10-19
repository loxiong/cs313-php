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
        <title>Scripture Database Practice with PHP Queries</title>
    </head>
    
    <body>
        <main>
            <h1>CS313 Week 05</h1>
            <h2>Links to this Week's Team and Reading Activities</h2>
            <p><a href="teamweek5.php">Scripture Resource</a></p>
            <p><a href="form.php">Add a Scripture to the Table</a></p>
            <p><a href="scriptureSearch.php">Search for a Scripture</a></p>
            <p><a href="search.php">Search Scripture</a></p>
            <h2>More PHP Queries Practice</h2>
            <p><a href="basicqueries.php">Basic PHP Queries</a></p>
        </main>
    </body>
    
</html>
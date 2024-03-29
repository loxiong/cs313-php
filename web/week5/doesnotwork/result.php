<!--WEEK 05 - RESULT PAGE FOR SEARCH.PHP
----THIS PAGE DOESN'T WORK-->
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
        <title>Scripture Database Form</title>
    </head>
    
    <body>
        <main>
            <?php
    $statement = $db->prepare("SELECT * FROM scriptures
            WHERE (`book` LIKE '%".$query."%') OR (`content` LIKE '%".$query."%')") or die(mysql_error());
   
    $query = $_GET['query']; 
    // gets value sent over search form
    $query = htmlspecialchars($query); 
    // changes characters used in html to their equivalents, for example: < to &gt;
    //$query = pg_real_escape_string($query);
    // makes sure nobody uses SQL injection
    $raw_results = pg_query("SELECT * FROM scriptures
            WHERE (`book` LIKE '%".$query."%') OR (`content` LIKE '%".$query."%')") or die(mysql_error());
    $statement->execute();
     
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(pg_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = pg_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['book']."</h3>".$results['content']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         

?>
        </main>
    </body>
    
</html>

<!--WEEK 05 - SCRIPTURE DETAILS FROM FORM SUBMISSION - TEAM ACTIVITY-->
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
//$id = -1;
//if(isset($_GET["id"])){
//$id = $_GET["id"];
//}
//if (isset($db) && $id > 0){
//$statement = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
//$statement->execute(array(':id' => $id));
//$result = $statement->fetch(PDO::FETCH_ASSOC);
//}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Week 5 Team Activity">        
        <title>Scripture Details</title>
    </head>
    
    <body>
        <main>
            <h1>Scripture Detail</h1>
            <?php
            $searching = $_POST['searching'];
            $find = $_POST['find'];
            $field = $_POST['field'];
            //This is only displaued if they have submitted the form
            if ($searching == "yes") {
                echo"<h2>Search Results</h2>";
                if ($find == "") {
                    echo "<p>You forgot to enter a search word";
                    exit;
                }
            }
            //Perform filtering
            $find = strip_tags($find);
            $find = trim($find);
            //Connect to database
            //Execute query
            $sql = "SELECT * FROM scriptures where $field = '$find' limit 30 ";
            $result = pg_query($db, $sql);
            if (!$result) {
                die("Error in SQL query: " . pg_last_error());
            }
            while ($row = pg_fetch_array($result))
            {
                $rows = pg_num_rows($result);
                if ($rows == 0)
                {
                echo "Sorry, but we can not find an entry to match your query<br><br>";
                }
                //And we remind them what they searched for
                echo "<b>Searched For:</b> " .$find;
                echo "<b>Number of rows :</b> " .$rows;
            } 
            //Free memory
            pg_free_result($result);
            ?>
        </main>
    </body>
    
</html>
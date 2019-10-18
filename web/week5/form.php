<!WEEK 05 - SCRIPTURE TABLE PHP QUERIES - TEAM ACTIVITY-->
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
            <h2>Search</h2>
            <form name="search" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                Search for: <input type="text" name="find" /> in
                <Select NAME="field">
                    <Option VALUE="book">book</Option>
                    <Option VALUE="chapter">chapter</Option>
                </Select>
                <input type="hidden" name="searching" value="yes" />
                <input type="submit" name="search" value="Search" />
            </form>
        </main>
    </body>
    
</html>
<?php
            $searching = $_POST['searching'];
            $find = $_POST['find'];
            $field = $_POST['field'];
            //This is only displayed if they have submitted the form
            if ($searching == "yes") {
                echo"<h2>Search Results</h2>";
                if ($find == "") {
                    echo "<p>You forgot to enter a search word";
                    exit;
                }
            }
            //Prepare the statements
            $statement = $db->prepare('SELECT book FROM scriptures WHERE $find = $field');
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $content = $row['content'];
                echo "<p>$content </p>";
            }

            //Perform filtering
            $find = strip_tags($find);
            $find = trim($find);
            //Connect to database
            //Execute query
            $sql = "SELECT * FROM scriptures where $field = '$find' ";
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


<!--WEEK 05 - PRACTICE BASIC QUERIES IN PHP - READING ACTIVITY-->
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
//Prepared Statements
$stmt = $db->prepare('SELECT * FROM note_user WHERE id=:id AND username=:username');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basic Queries in PHP</title>
    </head>
    <body>
        <h1>Basic Query in PHP</h1>
        <h2>Display the username and password</h2>
        <?php
            foreach ($db->query('SELECT username, password FROM note_user') as $row) {
                echo 'user: ' . $row['username'];
                echo ' password: ' . $row['password'];
                echo '<br/>';
            }
        ?>
        
        <h2>Display notes only written by John</h2>
        <?php
            //Prepare the statements
            $statement = $db->prepare('SELECT content FROM note WHERE userID=1');
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
        ?>
        
        <h2>Enter data into note table</h2>
            <form name="insert" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
                <label>User ID:</label><input type="text" name="userId" />
                <label>Content:</label><input type="text" name="content" />
            <input type="submit" />
            </form>
        <?php
            //$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=myadmin123");
            $statement = $db->prepare("INSERT INTO note (userId, content) VALUES ('$_POST[userId]','$_POST[content]')");
            $statement->execute();
            
            //THIS QUERY BELOW DIDN'T WORK
            //$query = "INSERT INTO note (userId, content) VALUES ('$_POST[userId]','$_POST[content]')";
            //$result = pg_query($query); 
        ?>

    </body>
</html>
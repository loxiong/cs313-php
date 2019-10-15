<!WEEK 05 - BASIC QUERIES IN PHP - READING ACTIVITY-->
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
//$stmt = $db->prepare('SELECT * FROM note_user WHERE id=:id AND username=:username');
//$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//$stmt->bindValue(':username', $username, PDO::PARAM_STR);
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <p>Display the username and password</p>
        <?php
            foreach ($db->query('SELECT username, password FROM note_user') as $row) {
                echo 'user: ' . $row['username'];
                echo 'password: ' . $row['password'];
                echo '<br/>';
            }
        ?>
        <p>Display notes only written by John</p>
        <?php 
            foreach ($db->query('SELECT n.content FROM note_user AS u
                                    JOIN note AS n
                                    ON u.id = n.userid
                                    WHERE u.username = "john" ') as $row) {
                echo 'NOTE: ' . $row['content'];
                echo '<br/>';
            }
        ?>
    </body>
</html>
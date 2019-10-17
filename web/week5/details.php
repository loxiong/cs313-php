<!WEEK 05 - SCRIPTURE DETAILS FROM FORM SUBMISSION - TEAM ACTIVITY-->
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
$id = -1;
if(isset($_GET["id"]))
{
$id = $_GET["id"];
}
if (isset($db) && $id > 0)
{
$statement = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
$statement->execute(array(':id' => $id));
$result = $statement->fetch(PDO::FETCH_ASSOC);
}
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
            <div class="container">
            <?php
                $book = $_POST['book'];
                $chapter = $_POST['chapter'];
                $verse = $_POST['verse'];
                $content = $_POST['content'];
                $SQL = "select * from scriptures where book = '$book' 
                and chapter = '$chaoter' ";
                $result = mySQL_query($SQL);
                if(mySQL_num_rows($result)>0)
                {echo "<h4>".
                "-- Scripture Resource -- ".
                $row[3]."</h4>",
                "</br>";
                while ($row=mySQL_fetch_row($result)){
                    echo "<p>". "Book : ".$row[0]." </p>";
                    echo "<p>". "Chapter : ". $row[1]."</p>"; 
                    echo "<p>". "Verse : ". $row[2]."</p>";
                    echo "<p>". "Content : ". $row[3]."</p>";
                }
                else echo "Invalid entry";
            ?>
            
            </div>
            <?php
                echo '<p><b>' . $result['book'] . ' ' . $result['chapter'] . ':' . $result['verse'] . '</b> - "' . $result['content'] . '"</p>';
            ?>
        </main>
    </body>
    
</html>
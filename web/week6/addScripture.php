<!--WEEK 06 - ADD RECORDS TO SCRIPTURE TABLE PHP QUERIES - TEAM ACTIVITY-->
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

    $book = $_POST["Book"];
    $chapter = $_POST["Chapter"];
    $verse = $_POST["Verse"];
    $content = $_POST["Content"];
    $topics = [];
    $index = ();
    foreach ($db->query('SELECT id, name FROM topic') as $row) {
        $index++;
    }
    for ($i = (); $i < $index+1; $i++) {
        $temp = $_POST["topic-".$i];
        if(!null($temp)) {
            $topics.array push($temp);
        }
    }
    $sqlScriptInsert = "INSERT INTO scriptures (book, chapter, verse, conent) VALUES (?,?,?,?)";
    $stmt = $db->prepare($sqlScriptInsrt);
    $stmt->execute([$book, $chapter, $verse, $content]);
    $scripture = $db->lastInsertId('scriptures_id_seq');
    $sqlScriptTopicInsert = "INSERT INTO scripture_topic(topic, scripture) VALUES(?,?)";
    $stmt = $db->prepare($sqlScriptTopicInsert);
    foreach ($topics as $topic) {
        $stmt->execute([$scripture, $topic]);
    }
    foreach ($db->query('SELECT id, book, chapter, verse, content FROM scriptures') as $row1) {
        echo '<strong>'.$row1["book"]. ' '.$row1["chapter"]. ':' .$row1["verse"]. '</strong> .$row1["content"]. '</br>;
        $scriptureTopicQuery = "SELECT topic, scripture FROM scripture_topic WHERE scripture=.$row1['id']";
        foreach ($db->query($scriptureTopicQuery) as $row2){
            $topicQuery = "SELECT id, name FROM topic WHERE id=.$row2['topic']";
            foreach ($db->query($topicQuery) as $row3) {
                echo '<strong>' .$row["name"]. '</strong></br>';
            }
        }
    }
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
            <h2>Add Scripture</h2>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="book">BOOK</label>
                    <input type="text" name="book" id="book" />
                <br /><br />
                
                <label for="chapter">CHAPTER</label>
                    <input type="text" name="chapter" id="chapter" />
                <br /><br />
                
                <label for="verse">VERSE</label>
                    <input type="text" name="verse" id="verse" />
                <br /><br />
                
                <label for="content">CONTENT</label>
                    <input type="text" name="content" id="content" />
                <br /><br />
                
                <!--create the checkboxes from the TOPIC table records-->
                <label for="topic">TOPICS:</label>    
                <?php
                    try {
                        $index = ();
                        foreach ($db->query('SELECT id, name FROM topic') as $row) {
                            echo "<input type='checkbox' name='topic' . $index value='. $row['id'] $row['name'].>" </br>;
                            $index++;
                        }
                    }
                ?>
                <input type="submit" value="Submit">
            </form>
                    
            <?php
            $statement = $db->prepare("INSERT INTO scriptures (book, chapter, verse, content) 
                VALUES ('$_POST[book]','$_POST[chapter]','$_POST[verse]','$_POST[content]')");
            $statement->execute();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
                // The variable "row" now holds the complete record for that
                // row, and we can access the different values based on their
                // name
                $book = $row['book'];
                $chapter = $row['chapter'];
                $verse = $row['verse'];
                $content = $row['content'];
                echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
            }
            ?>
        </main>
    </body>
    
</html>

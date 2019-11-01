<!--INSTRUCTOR'SOLUTION
-- on how to query and call to get the topic
-- This is the final page of inserting a new scripture
-- It will show the new scripture entries from the database
-- However, in my example, I redirected to scripture.php and not this page
-->
<?
require('dbConnect.php'); //import the function
$db = get_db(); //calls the function
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>CS 313 Week 06 Team</title>
        <meta name="description" content="Week 06 Team Activity">
    </head>
    <body>

        <div>

        <h1>Scripture and Topic List</h1>

        <?php
        try
        {
            // NOTES FROM INSTRUCTOR'S SOLUTION
            // For this example, we are going to make a call to the DB to get the scriptures
            // and then for each one, make a separate call to get its topics.
            // This could be done with a single query (and then more processing of the resultset
            // afterward) as follows:
            //	$statement = $db->prepare('SELECT book, chapter, verse, content, t.name FROM scripture s'
            //	. ' INNER JOIN scripture_topic st ON s.id = st.scriptureId'
            //	. ' INNER JOIN topic t ON st.topicId = t.id');
            // prepare the statement
            $stmt = $db->prepare('SELECT id, book, chapter, verse, content FROM scriptures');
            $stmt->execute();
            // Go through each result
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                echo '<p>';
                echo '<strong>' . $row['book'] . ' ' . $row['chapter'] . ':';
                echo $row['verse'] . '</strong>' . ' - ' . $row['content'];
                echo '<br />';
                echo 'Topics: ';
                // get the topics now for this scripture
                $stmtTopics = $db->prepare(
                    'SELECT name 
                     FROM topic t' . ' 
                     INNER JOIN scripture_topic st ON st.topic_id = t.id' . ' 
                     WHERE st.scriptures_id = :scriptures_id');
                $stmtTopics->bindValue(':scriptures_id', $row['id']);
                $stmtTopics->execute();
                // Go through each topic in the result
                while ($topicRow = $stmtTopics->fetch(PDO::FETCH_ASSOC))
                {
                    echo $topicRow['name'] . ' ';
                }
                echo '</p>';
            }
        }
        catch (PDOException $ex)
        {
            echo "Error with DB. Details: $ex";
            die();
        }
        ?>

    </div>

</body>
</html>
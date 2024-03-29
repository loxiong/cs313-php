<!--modeled after PHP Connect and Query - video notes -->
<?
require('dbConnect.php'); //import the function
$db = get_db(); //calls the function

//query to get the scriptures: SELECT book, chapter, verse, content FROM scriptures;

$query = 'SELECT id, book, chapter, verse, content FROM scriptures';
$stmt = $db->prepare($query);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>CS 313 Week 06 Reading</title>
        <meta name="description" content="Week 06 Reading Activity">
    </head>
    
    <body>
        <header>
            <h1>Scriptures</h1>
        </header>    
        
        <main>
            <ul>
            <?php
            foreach ($scriptures as $scripture) 
            {
                /*create variables to store the data from each table column */
                $id = $scripture['id'];
                $book = $scripture['book'];
                $chapter = $scripture['chapter'];
                $verse = $scripture['verse'];
                $content = $scripture['content'];
                
                /* replace the parts of the data in the echo
                 * echo "<li><p> $book $chapter:$verse - $content</p></li>";
                 * change the echo to a link that point to script_content.php 
                 * the user will see the scripture's verse and topic on the script_content.php page
                 * use the $id variable that was defined above
                 * so when the link is generated, it will have the correct ids generate in the right spot
                 */
                echo "<li><p><a href='script_content.php?scriptures_id=$id'>$book $chapter:$verse </a> - Click For Content</p></li>";
                
                /* trying to display the following
                 * echo "<p> John 3:16 - content goes here</p>";
                 */

                /*if this didn't work out, you can:
                 *run just the query in the database to see if it works
                 *var_dump($course) or var_dump($courses)
                 *var_dump is like an echo statement that just prints out the information about that variable
                 */
            }
            ?>
            </ul>
            
        </main>
    
    </body>
</html>
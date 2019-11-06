<!--how to add a new item and
-- must select a category from the CATEGORY TABLE
-- must select a store from STORE TABLE
-- the form must POST
-->
<?
session_start();
require("redirects.php");
$user = $_SESSION["user"];
$name = $_SESSION["first_name"];
if (!isset($user)) {
    loginRedirect();
}
require("dbconnect.php");
//$db = get_db();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Add New Item</title>
        <meta name="description" content="Week 06 Project Continue - add new item to database">
    </head>
    <body>
   
        <main>
        <h1>Enter New Item </h1>
        
            <form id="mainForm" action="item_insert.php" method="POST">
                <label for="name">Book</label>
                <input type="text" id="name" name="name">
                <br /><br />
            
                <label for="description">Content:</label><br />
	            <textarea id="description" name="description" rows="10" cols="100"></textarea>
	            <br /><br />
                
                <label for="quantity">Chapter</label>
                <input type="text" id="quantity" name="quantity">
                <br /><br />

	            <label for="price">Verse</label>
                <input type="text" id="price" name="price">
	            <br /><br />

	            

                <label><h2>Category:</h2></label><br />

                <?php
                // need to generate check boxes for topics
                // based on what is in the database
                try
                {
                    // Do not use "SELECT *" here. Only bring back the fields that you need.
                    // Prepare the statement
                    $stmt = $db->prepare('SELECT category_id, category_name FROM category');
                    $stmt->execute();
                    // Go through each result
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $idCat = $rows['category_id'];
                        $nameCat = $rows['category_name'];
                        // make the value of the checkbox to be the id of the label
                        echo "<input type='checkbox' name='checkboxCat[]' id='checkboxCat$idCat' value='$idCat'>";
                        // Instructor's Notes:
                        // Also, so they can click on the label, and have it select the checkbox,
                        // we need to use a label tag, and have it point to the id of the input element.
                        // The trick here is that we need a unique id for each one. In this case,
                        // we use "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxCat$idCat'>$nameCat</label><br />";
                        // put a newline out there just to make our "view source" experience better
                        echo "\n";
                    }
                }
                catch (PDOException $ex)
                {
                    // Please be aware that you don't want to output the Exception message in
                    // a production environment
                    echo "Error connecting to DB. Details: $ex";
                    die();
                }
                ?>
                    <br />
                
                <label><h2>Store:</h2></label><br />

                <?php
                // need to generate check boxes for topics
                // based on what is in the database
                try
                {
                    // Do not use "SELECT *" here. Only bring back the fields that you need.
                    // Prepare the statement
                    $stmt = $db->prepare('SELECT store_id, store_name FROM store');
                    $stmt->execute();
                    // Go through each result
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $idSt = $rows['store_id'];
                        $nameSt = $rows['store_name'];
                        // make the value of the checkbox to be the id of the label
                        echo "<input type='checkbox' name='checkboxSt[]' id='checkboxSt$idSt' value='$idSt'>";
                        // Instructor's Notes:
                        // Also, so they can click on the label, and have it select the checkbox,
                        // we need to use a label tag, and have it point to the id of the input element.
                        // The trick here is that we need a unique id for each one. In this case,
                        // we use "checkbox" followed by the id, so that it becomes something like
                        // "checkbox1" and "checkbox2", etc.
                        echo "<label for='checkboxSt$idSt'>$nameSt</label><br />";
                        // put a newline out there just to make our "view source" experience better
                        echo "\n";
                    }
                }
                catch (PDOException $ex)
                {
                    // Please be aware that you don't want to output the Exception message in
                    // a production environment
                    echo "Error connecting to DB. Details: $ex";
                    die();
                }
                ?>
                    <br />
                    <input type="submit" value="Add New Item" />
            </form>
        </main>

    </body>
</html>
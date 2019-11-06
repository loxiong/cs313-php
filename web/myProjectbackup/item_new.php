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
        <link href="css/styles.css" rel="stylesheet">  
    </head>
    <body>
        
        <table>
            <tr>
                <span>Add New Concession Item</span>
                <a href="./home.php"><div>Back</div></a>
                <a href="./logout.php"><div>Logout</div></a>
            </tr>
        </table>
        <hr />
   
        <main>
        <h1>Enter New Item </h1>
        
            <form id="mainForm" action="item_insert.php" method="POST">
                <label for="item_name">Product Name</label>
                <input type="text" id="item_name" name="item_name">
                <br /><br />
            
                <label for="description">Description:</label><br />
	            <textarea id="description" name="description" rows="10" cols="100"></textarea>
	            <br /><br />
                
                <label for="quantity">Quantity</label>
                <input type="text" id="quantity" name="quantity">
                <br /><br />

	            <label for="price">Price</label>
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
                        // to create unique id: we use "checkbox" followed by the id, so that it becomes something like "checkbox1" and "checkbox2", etc.
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
                        // to create unique id: we use "checkbox" followed by the id, so that it becomes something like "checkbox1" and "checkbox2", etc.            
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
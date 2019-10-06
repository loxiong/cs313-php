<?php session_start();
//initialize sessions
//define the products and cost
$images = array("<img src='images/apples.jpg'>", "<img src='images/apricots.jpg'>", "<img src='images/bananas.jpg'>", "<img src='images/cherries.jpg'>", "<img src='images/oranges.jpg'>", "<img src='images/grapes.jpg'>");
$products = array("Honey Crisp Apple", "Sun Glow Apricot", "Cavendish Bananas", "Kiona Sweet Cherries", "Sweetest Orange", "Kyoho Grapes");
$amounts = array("10.00", "20.00", "5.00", "20.00", "15.00", "20.00");
//Load up session
if ( !isset($_SESSION["total"]) ) {
    $_SESSION["total"] = 0;
    for ($i=0; $i< count($products); $i++) {
        $_SESSION["images"][$i] = 0;
        $_SESSION["qty"][$i] = 0;
        $_SESSION["amounts"][$i] = 0;
    }
}
//Add
 if ( isset($_GET["add"]) ) {
    $i = $_GET["add"];
    $qty = $_SESSION["qty"][$i] + 1;
    $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    $_SESSION["cart"][$i] = $i;
    $_SESSION["qty"][$i] = $qty;
    $message = "Added to the Basket!";
    echo "<SCRIPT> alert('$message');</SCRIPT>";
}    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Product Gallery">
        
        <title>Fruit Store</title>
        
        <link href="css/styles.css" rel="stylesheet">      
    </head>
    
    <body>
        <main>
            <h1>Fresh Fruit</h1>
            <h3>Available Items</h3>
            <hr>
            
            <div class="table">
                <table>
                    <tr>
                        <th>Images</th>
                        <th width="10px">&nbsp;</th>
                        <th>Product</th>
                        <th width="10px">&nbsp;</th>
                        <th>Amount</th>
                        <th width="10px">&nbsp;</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    for ($i=0; $i< count($products); $i++) {
                    ?>
                    <tr>
                        <td><?php echo($images[$i]); ?></td>
                        <td width="10px">&nbsp;</td>
                        <td><?php echo($products[$i]); ?></td>
                        <td width="10px">&nbsp;</td>
                        <td>&dollar;<?php echo($amounts[$i]); ?></td>
                        <td width="10px">&nbsp;</td>
                        <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <div class="primary-button">
                <button type="button"> <a href="viewcart.php">View Cart</a></button>
            </div>
        </main>
    </body>
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</html>
<?php session_start();
//initialize sessions
//Define the products and cost
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
//Delete
if ( isset($_GET["delete"]) ) {
    $i = $_GET["delete"];
    $qty = $_SESSION["qty"][$i];
    $qty--;
    $_SESSION["qty"][$i] = $qty;
    //remove item if quantity is zero
    if ($qty == 0) {
        $_SESSION["amounts"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    }
    else {
        $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="View Items in Shopping Cart"> 

        <title>View Cart</title>

        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
    <body>
        <h1>Your Shopping Basket</h1>
        <hr>
        
        <div class="shopping-cart">
            <div class="txt-heading">

            <div id="cart-item">
                <?php
                if ( isset($_SESSION["cart"]) ) {
                ?>
                <br/>
                <table>
                    <tr>
                        <th>Product</th>
                        <th width="10px">&nbsp;</th>
                        <th>Quantity</th>
                        <th width="10px">&nbsp;</th>
                        <th>Amount</th>
                        <th width="10px">&nbsp;</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ( $_SESSION["cart"] as $i ) {
                    ?>
                    <tr>
                        <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                        <td width="10px">&nbsp;</td>
                        <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                        <td width="10px">&nbsp;</td>
                        <td>&dollar;<?php echo( $_SESSION["amounts"][$i] ); ?></td>
                        <td width="10px">&nbsp;</td>
                        <td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td>
                    </tr>
                    <?php
                     $total = $total + $_SESSION["amounts"][$i];
                     }
                     $_SESSION["total"] = $total;
                     ?>
                     <tr>
                        <td colspan="7">Total : &dollar;<?php echo($total); ?></td>
                     </tr>
                 </table>
                 <?php
                 }
                 ?>
            </div>
            </div>
            <div class="primary-button">
                <button type="button"> <a href="checkout.php">Check Out</a></button>
            </div>
            <div class="secondary-button">
                <button type="button"> <a href="index.php">Return to Products</a></button>
            </div>
        </div>
    </body>
</html>

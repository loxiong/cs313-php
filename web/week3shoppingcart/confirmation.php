<?php 
session_start(); 
$name = htmlspecialchars($_POST['name']);
$address = htmlspecialchars($_POST['address']);
$city = htmlspecialchars($_POST['city']);
$state = htmlspecialchars($_POST['state']);
$zipcode= htmlspecialchars($_POST['zipcode']);
//products and cost
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
//Reset to clear the cart after confirmation
if ( isset($_GET['reset']) ){ 
    if ($_GET["reset"] == 'true') {
        //destroys session
        session_destroy();
    }
    header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Ching Lo | CS313:03">
        <meta name="description" content="Confirm Purchase"> 

        <title>Confirmation Page</title>

        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <body>
        <div class="confirmation">
            <h1>Thank you, <?php echo $name; ?>. </h1>
            <div class="shipping-address">
                <p>You're beautiful fresh fruit basket will be shipped to: </p>
                <p><?php echo $address; ?>, <?php echo $city; ?>, <?php echo $state; ?>, <?php echo $zipcode; ?>. </p>
                
                <div class="conf-item">
                    <h3>Order Summary</h3>
                <?php
                if ( isset($_SESSION["cart"]) ) {
                ?>
                <br/>
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ( $_SESSION["cart"] as $i ) {
                    ?>
                    <tr>
                        <td><?php echo( $products[$_SESSION["cart"][$i]] ); ?></td>
                        <td><?php echo( $_SESSION["qty"][$i] ); ?></td>
                    </tr>
                    <?php
                     $total = $total + $_SESSION["amounts"][$i];
                     }
                     $_SESSION["total"] = $total;
                     ?>
                     <tr>
                        <td colspan="2">Total : &dollar;<?php echo($total); ?></td>
                     </tr>
                 </table>
                 <?php
                 }
                 ?>
            </div>
            </div>
            
            <div class="primary-button">
                <a href="?reset=true"><input class="primary-button" type="submit" value="Shop Again"></a>
            </div>
        </div>
    </body>
    
<script src="scripts/jquery-3.2.1.min.js" type="text/javascript"></script>
</html>
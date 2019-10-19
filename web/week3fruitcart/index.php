<?php 
session_start(); 
require_once ("product.php");
$product = new Product();
$productArray = $product->getAllProduct();
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
            <div id="product-grid">
                <?php
                if (! empty($productArray)) {
                    foreach ($productArray as $k => $v) {
                ?>
                <div class="product-item">
                    <form id="formCart">
                        <div class="product-image">
                            <img src="<?php echo $productArray[$k]["image"]; ?>">
                        </div>
                        <div>
                            <div class="product-info">
                                <strong><?php echo $productArray[$k]["name"]; ?></strong>
                            </div>
                            <div class="product-info product-price">
                                <strong><?php echo "$".$productArray[$k]["price"]; ?></strong>
                            </div>
                            <div class="product-info">
                                <input type="text" 
                                       id="qty_<?php echo $productArray[$k]["code"]; ?>"
                                       name="quantity" 
                                       value="1" 
                                       size="1" />
                                <button type="button"
                                        id="add_<?php echo $productArray[$k]["code"]; ?>"
                                        class="btnAddAction cart-action"
                                        onClick="cartAction('add','<?php echo $productArray[$k]["code"]; ?>')">
                                    <img src="images/add-to-cart.png" />
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="primary-button">
                <button type="button"> <a href="viewcart.php">View Cart</a></button>
            </div>
        </main>
    </body>
    
<script src="scripts/script.js"></script>
<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</html>
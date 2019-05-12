<?php

    session_start();

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    } 
    if($_SERVER['REQUEST_METHOD'] == "GET" AND isset($_GET['id'])){
    array_push($_SESSION['cart'], $_GET['id']);
    $message = "Added to cart.";
    }
    
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
    <title>Browse Items | CS 313</title>
    <meta name="description" content="This page allows a user to see items which can be added to their cart.">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>


<body>
    <main>
        <div class="center">
            <h1>Shop</h1>
            <div class="portal"><a class="portal" href="../../portal.php">Portal Page</a></div>
            <div>
                <?php
                    if (isset($message)) {
                        echo "<p class='message'>" . $message . "</p>";
                        
                        $message = NULL;
                        
                      }
                      
                ?>
                <p>Welcome to the online shop.  Below is our current inventory:</p>
            </div>

            <h2>Inventory</h2>
            <div class="grid-container">
                <figure>

                    <img src="assets/basketball.jpg"  alt="basketball">
                    
                    <figcaption>Basketball</figcaption>
                    <a class="add-to-cart" href="browse.php?id=1">Add to Cart</a>
                </figure>
                <figure>
                    <img src="assets/switch.jpg" height=300 width=300 alt="Switch">
                    
                    <figcaption>Nintendo Switch</figcaption>
                    <a class="add-to-cart" href="browse.php?id=2">Add to Cart</a>
                </figure>
            </div>
            
            <div class="grid-container">
                <figure>

                    <img src="assets/sunglasses.jpg" alt="sunglasses">
                    
                    <figcaption>Sunglasses</figcaption>
                    <a class="add-to-cart" href="browse.php?id=3">Add to Cart</a>
                </figure>
                <figure>

                    <img src="assets/fishing-pole.jpg"  alt="Fishing Pole">
                    
                    <figcaption>Fishing Pole</figcaption>
                    <a class="add-to-cart" href="browse.php?id=4">Add to Cart</a>
                </figure>
            </div>
            
        </div>
        <a class="cart" href="view-cart.php">View Shopping Cart<i class="fas fa-shopping-cart"></i></a>

    </main>
    <footer>
        <p>&copy;2019 | M Behling | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>

</body>

</html>
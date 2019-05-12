<?php

    session_start();

    $basketball = 0;
    $switch = 0;
    $sunglasses = 0;
    $fishing = 0;
    

    if (!empty($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $x=>$y)
    {
        if ($y == 1)
        {
            $basketball += 1;
        }
        elseif ($y== 2)
        {
            $switch += 1;
        }
        elseif ($y== 3)
        {
            $sunglasses += 1;
        }
        elseif ($y== 4)
        {
            $fishing += 1;
        }
       
    }
}



// Add another to cart
if ($_SERVER['REQUEST_METHOD'] == "GET" AND isset($_GET['id'])){
    array_push($_SESSION['cart'], $_GET['id']);
    header("location: view-cart.php");
}

function removeAll(){
    //$basketball = 0;
    //$switch = 0;
    //$sunglasses = 0;
    //$fishing = 0;
    
    session_destroy();
    header("location: view-cart.php");
    
}

function removeOnePole(){
    
    if (!empty($_SESSION['cart'])){
        
        foreach ($_SESSION['cart'] as $x=>$y)
        {
            if ($y == 4)
            {
                unset($_SESSION['cart'][$x]);
                break;
            }
           
            header("location: view-cart.php");
            
           
        }
   
    }
}
function removeOneSunglasses(){
    
    if (!empty($_SESSION['cart'])){
        
        foreach ($_SESSION['cart'] as $x=>$y)
        {
            if ($y == 3)
            {
                unset($_SESSION['cart'][$x]);
                break;
            }
           
            header("location: view-cart.php");
            
           
        }
   
    }
}
function removeOneSwitch(){
    
    if (!empty($_SESSION['cart'])){
        
        foreach ($_SESSION['cart'] as $x=>$y)
        {
            if ($y == 2)
            {
                unset($_SESSION['cart'][$x]);
                break;
            }
           
            header("location: view-cart.php");
            
           
        }
   
    }
}

function removeOneBasketball(){
    
    if (!empty($_SESSION['cart'])){
        
        foreach ($_SESSION['cart'] as $x=>$y)
        {
            if ($y == 1)
            {
                unset($_SESSION['cart'][$x]);
                break;
            }
           
            header("location: view-cart.php");
            
           
        }
   
    }
}

$emptyMessage = "<span class='red'>Your Cart is Empty</span>";


?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
    <title>View Cart | CS 313</title>
    <meta name="description" content="This page allows a user to see items currently in their cart.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<header class='cart-header'>
<a href="view-cart.php">Edit Shopping Cart</a>
        <a href="browse.php">Back to Browse</a>
</header>
<body>
    <main>
    <h1>Enter Shipping Address</h1>
    <form class='address-form' action="confirmation.php" method="POST">
        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
        <input type="text" id="fname" name="firstname" placeholder="John Smith">
        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
        <input type="text" id="adr" name="address" placeholder="123 Street" required>
        <label for="city"><i class="fa fa-institution"></i> City</label>
        <input type="text" id="city" name="city" placeholder="Salt Lake City" required>

        <label for="state">State</label>
        <input type="text" id="state" name="state" placeholder="UT" required>

        <label for="zip">Zip</label>
        <input type="text" id="zip" name="zip" placeholder="12345" required>
        <input class='order-now' type="submit" value="Order Now" class="btn">

    </form>

    <div class="grid-container-col">
                
        <div class="center">
            <h1>My Cart</h1>
            <div class="portal"><a class="portal" href="portal.php">Portal Page</a></div>
            <div>
                <p>Cart Status: <?php if (empty($_SESSION['cart'])){echo $emptyMessage;} ?> </p>
            </div>

            
            <div class="grid-container-col">
                <?php

                if ($basketball > 0) {
                echo "<figure>" .
                    "<img src='assets/basketball.jpg' width=150 alt='basketball'>" .
                    "<figcaption>Basketball | <strong>Quantity " . $basketball . "</strong></figcaption>" .
                    '</form>' .
                "</figure>";
                }
                if ($switch > 0){
                echo "<figure>" .
                    "<img src='assets/switch.jpg' height=150 width=150 alt='Switch'>" .
                    '<figcaption>Nintendo Switch | <strong>Quantity ' . $switch . '</strong></figcaption>' .
                    '</form>' .
                '</figure>';
                }
                ?>
            </div>
            
            <div class="grid-container-col">
            <?php
                if ($sunglasses > 0) {
                echo '<figure>' .
                    '<img src="assets/sunglasses.jpg" width=150 alt="sunglasses">' .                   
                    '<figcaption>Sunglasses | <strong>Quantity ' . $sunglasses . '</strong></figcaption>' .
                    '</form>' .
                '</figure>';
                }
                if ($fishing > 0) {
                echo '<figure>' .
                    '<img src="assets/fishing-pole.jpg" width=150 alt="Fishing Pole">' .
                    '<figcaption>Fishing Pole | <strong>Quantity ' . $fishing . '</strong></figcaption>' .
                    '</form>' .
                '</figure>';
                }
                ?>
            </div>

        </div>
    </main>
    <footer>
        <p>&copy;2019 | M Behling | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>

</body>

</html>
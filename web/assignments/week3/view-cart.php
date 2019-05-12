<?php

    session_start();


    // if product id = true
    // then add product to new array to hold quantities
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

</head>
<header class='cart-header'>
<a href="view-cart.php">View Shopping Cart</a>
        <a href="browse.php">Back to Browse</a>

        <?php
            if (!empty($_SESSION['cart'])){
                echo '<a class="purple" href="checkout.php"><strong>Checkout</strong></a>';
            }
        ?>
</header>



<body>
    <main>
        <div class="center">
            <h1>My Cart</h1>
            <div class="portal"><a class="portal" href="../../portal.php">Portal Page</a></div>
            <div>
                <p>Cart Status: <?php if (empty($_SESSION['cart'])){echo $emptyMessage;} ?> </p>
            </div>

            <div class="grid-container-col">
                <?php

                if ($basketball > 0) {
                echo "<figure>" .
                    "<img src='assets/basketball.jpg' width=150 alt='basketball'>" .
                    "<figcaption>Basketball | <strong>Quantity " . $basketball . "</strong></figcaption>" .
                    "<a class='increase-quantity' href='view-cart.php?id=1'>+1</a>" .
                    '<form action="view-cart.php" method="POST">' .
                    '<input class="decrease-quantity" type="submit" name="removeBasketball" value="-1">' .
                    '</form>' .
                "</figure>";
                }
                if ($switch > 0){
                echo "<figure>" .
                    "<img src='assets/switch.jpg' height=150 width=150 alt='Switch'>" .
                    '<figcaption>Nintendo Switch | <strong>Quantity ' . $switch . '</strong></figcaption>' .
                    '<a class="increase-quantity" href="view-cart.php?id=2">+1</a>'.
                    '<form action="view-cart.php" method="POST">' .
                    '<input class="decrease-quantity" type="submit" name="removeSwitch" value="-1">' .
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
                    '<a class="increase-quantity" href="view-cart.php?id=3">+1</a>' .
                    '<form action="view-cart.php" method="POST">' .
                    '<input class="decrease-quantity" type="submit" name="removeSunglasses" value="-1">' .
                    '</form>' .
                '</figure>';
                }
                if ($fishing > 0) {
                echo '<figure>' .
                    '<img src="assets/fishing-pole.jpg" width=150 alt="Fishing Pole">' .
                    '<figcaption>Fishing Pole | <strong>Quantity ' . $fishing . '</strong></figcaption>' .
                    '<a class="increase-quantity" href="view-cart.php?id=4">+1</a>' .
                    '<form action="view-cart.php" method="POST">' .
                    '<input class="decrease-quantity" type="submit" name="removePole" value="-1">' .
                    '</form>' .
                '</figure>';
                }
                
                ?>
            </div>
            

            <form action="view-cart.php" method="POST">
                <input class="empty-cart" type="submit" name="Delete" value="Empty Cart">
            </form> 

            <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset ($_POST['Delete']))
                {
                    removeAll();
                }

                if($_SERVER['REQUEST_METHOD'] == "POST" and isset ($_POST['removePole']))
                {
                    removeOnePole();
                }

                if($_SERVER['REQUEST_METHOD'] == "POST" and isset ($_POST['removeSunglasses']))
                {
                    removeOneSunglasses();
                }

                if($_SERVER['REQUEST_METHOD'] == "POST" and isset ($_POST['removeSwitch']))
                {
                    removeOneSwitch();
                }

                if($_SERVER['REQUEST_METHOD'] == "POST" and isset ($_POST['removeBasketball']))
                {
                    removeOneBasketball();
                }
                
                ?>
            
            
        </div>
        
        

    </main>
    <footer>
        <p>&copy;2019 | M Behling | <a href="http://www.byui.edu/online">BYU-Idaho Online Learning</a> |
            <?php echo date('l, d F Y') ?></p>
    </footer>

</body>

</html>
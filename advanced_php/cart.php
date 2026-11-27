<?php

session_start();

if (isset($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $productId => $quantity) {

        echo "Product ID: " . htmlspecialchars((string)$productId);
        echo " Quantity: " . $quantity;
        echo "<br>";
    }

} else {

    echo "Your cart is empty";

}

?>
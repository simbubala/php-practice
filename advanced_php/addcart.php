<?php

session_start();

$productId = $_POST['product_id'];
$quantity = (int) $_POST['quantity'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($quantity <= 0) {
        die("Invalid quantity");
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }

    header("Location: cart.php");
exit;
}

?>

<form method="post" action="addcart.php">
    <input type="text" name="product_id" value="<?php echo $productId; ?>">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit">Add to Cart</button>
</form>
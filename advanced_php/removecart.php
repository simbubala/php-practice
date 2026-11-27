<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
$productId = $_POST['product_id'] ?? '';

unset($_SESSION['cart'][$productId]);

header("Location: cart.php");
exit;
}

?>

<form method="post" action="removecart.php">
    <input type="text" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">
    <button type="submit">Remove from Cart</button>
</form>
<?php
$products = [
    "laptop" => 1000,
    "phone" => 500,
    "tablet" => 300,
    "headphones" => 100,
    "keyboard" => 50
];
$total = 0;
foreach ($products as $product => $price) {
    $total += $price;
}
echo "Total price:" . $total;
?>
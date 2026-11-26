<?php

$products = ["Laptop", "Mobile", "Tablet", "Headphones"];

$search = "lApToP";

$found = false;

foreach ($products as $product) {
    if (stripos($product, $search) !== false) {
        echo "Product found: " . $product;
        $found = true;
        break;
    }
}

if (!$found) {
    echo "Product not found";
}

?>
<?php

try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=student;charset=utf8mb4",
        "root",
        "root"
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();

    $productId = 1;
    $purchaseQuantity = 2;

    if ($purchaseQuantity <= 0) {
        throw new Exception("Invalid purchase quantity");
    }

    $sql = "UPDATE product
            SET quantity = quantity - :purchaseQuantity
            WHERE product_id = :productId
            AND quantity >= :purchaseQuantity";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':purchaseQuantity' => $purchaseQuantity,
        ':productId' => $productId
    ]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("Insufficient stock or product not found");
    }

    $conn->commit();

    echo "Purchase successful";

} catch (Exception $e) {

    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    echo $e->getMessage();
}
?>
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
    $purchaseQuantity = 21;

    $sql = "SELECT quantity
            FROM product
            WHERE product_id = :productId
            FOR UPDATE";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':productId' => $productId]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product || $product['quantity'] < $purchaseQuantity) {
        throw new Exception("Insufficient stock");
    }

    
    $updateSql = "UPDATE product
                  SET quantity = quantity - :qty
                  WHERE product_id = :productId";

    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->execute([
        ':qty' => $purchaseQuantity,
        ':productId' => $productId
    ]);

    $conn->commit();

    echo "Purchase successful";

} catch (Exception $e) {

    if ($conn->inTransaction()) {
        $conn->rollBack();
    }

    echo $e->getMessage();
}
?>
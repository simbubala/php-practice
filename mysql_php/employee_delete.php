<?php

$conn = new PDO(
    "mysql:host=localhost;dbname=student;charset=utf8mb4",
    "root",
    "root"
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'] ?? '';

    if (!filter_var($id, FILTER_VALIDATE_INT) || $id <= 0) {
        die("Invalid employee ID");
    }

    $sql = "DELETE FROM employee WHERE employeeid = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([':id' => $id]);

    if ($stmt->rowCount() > 0) {
        echo "Employee deleted successfully";
    } else {
        echo "Employee not found";
    }
}

?>
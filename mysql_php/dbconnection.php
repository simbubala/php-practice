<?php
try {
    $department = 'software';
    $conn = new PDO("mysql:host=localhost;dbname=student;charset=utf8mb4", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM employee WHERE department = :department";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':department' => $department
    ]);

    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($employees as $employee) {
        echo htmlspecialchars($employee['employeename']) . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
<?php
$departmentId = 'software';
$conn = new PDO("mysql:host=localhost;dbname=student;charset=utf8mb4","root","root");

$sql = "SELECT * FROM employee WHERE department = :department";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':department' => $departmentId
]);

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $employee) {
    echo htmlspecialchars($employee['employeename']) . "<br>";
}
?>
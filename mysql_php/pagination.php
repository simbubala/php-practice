<?php

$conn = new PDO(
    "mysql:host=localhost;dbname=student;charset=utf8mb4",
    "root",
    "root"
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$limit = 10;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$page = max(1, $page);

$offset = ($page - 1) * $limit;


$countSql = "SELECT COUNT(*) FROM employee";
$totalRecords = $conn->query($countSql)->fetchColumn();

$totalPages = (int) ceil($totalRecords / $limit);


$sql = "SELECT * FROM employee
        ORDER BY employeeid
        LIMIT :limit OFFSET :offset";

$stmt = $conn->prepare($sql);

$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach ($employees as $employee) {
    echo htmlspecialchars($employee['employeename']) . "<br>";
}

for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}

?>
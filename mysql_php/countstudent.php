<?php
$conn = new PDO(
    "mysql:host=localhost;dbname=student;charset=utf8mb4",
    "root",
    "root"
);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT c.course_name, COUNT(s.name) AS total_students
        FROM courses c
        LEFT JOIN student s
            ON c.id = s.course_id
        GROUP BY c.id, c.course_name";

$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo htmlspecialchars($row['course_name']) . " - ";
    echo $row['total_students'] . "<br>";
}
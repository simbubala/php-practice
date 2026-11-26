<?php

$conn = new PDO(
    "mysql:host=localhost;dbname=student;charset=utf8mb4",
    "root",
    "root"
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM employee");
$stmt->execute();

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $employee) {
    echo htmlspecialchars($employee['employeename']);

    echo '<form method="POST" action="employee_delete.php"
          onsubmit="return confirm(\'Are you sure you want to delete this employee?\');">';

    echo '<input type="hidden" name="id" value="' .
         htmlspecialchars($employee['employeeid']) . '">';

    echo '<button type="submit">Delete</button>';

    echo '</form><br>';
}

?>
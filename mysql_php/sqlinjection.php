<?php

try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=student;charset=utf8mb4",
        "root",
        "root"
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $department = $_POST['department'] ?? '';

    $sql = "INSERT INTO employee (employeename, dob, gender, department)
            VALUES (:name, :dob, :gender, :department)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':dob' => $dob,
        ':gender' => $gender,
        ':department' => $department
    ]);

    echo "Employee inserted successfully";

} catch (PDOException $e) {
    error_log($e->getMessage());
    echo "Something went wrong";
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    DOB: <input type="date" name="dob" required><br>
    Gender:
    <select name="gender" required>
        <option value="">-- select gender --</option>
        <option value="F">Female</option>
        <option value="M">Male</option>
    </select><br>
    Department: <input type="text" name="department" required><br>
    <button type="submit">Submit</button>
</form>
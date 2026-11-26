<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeename = trim($_POST['employeename']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    
    if (empty($employeename)) {
        echo "Employee name is required";
    } elseif (empty($dob)) {
        echo "DOB is required";
    } elseif (empty("gender")) {
        echo "Gender is required";
    }
    try {
        $conn = new PDO("mysql:host=localhost;dbname=student;charset=utf8mb4","root","root");
        $sql = "INSERT INTO employee (employeename,dob,gender) values (:employeename,:dob,:gender)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':employeename' => $employeename,
            ':dob' => $dob,
            ':gender' => $gender
        ]);
    } catch (PDOException $e) {
        die("Database error:" . $e);
    }
}
?>
<form method = 'POST'>
    Employeename:
    <input type="text" name='employeename'><br></br>
    DOB:
    <input type="date" name='dob'><br></br>
    Gender:
    <select name="gender">
        <option value="">-- select gender --</option>
        <option value="F">Female</option>
        <option value="M">Male</option>
    </select>
    <button type = 'submit'>Submit</button>
</form>

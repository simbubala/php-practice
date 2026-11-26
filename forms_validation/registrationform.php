<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if (empty($name)) {
        echo "Name is required";
    } elseif (empty($email)) {
        echo "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Enter valid email id";
    }
    try {
        $mysqlconnect = new PDO("mysql:host=localhost;dbname=student;charset=utf8mb4","root","root");
        $mysqlconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $mysqlconnect->prepare("SELECT email from student WHERE email=:email");
        $sql->execute([
            ':email' => $email
        ]);
        $students = $sql->fetch(PDO::FETCH_ASSOC);
        if (empty($students)) {
            $insert = $mysqlconnect->prepare("INSERT INTO student (name,email) VALUES (:name,:email)");
            $insert->execute([
                ':name' => $name,
                ':email' => $email
            ]);
        } else {
            echo "Email already exists";
        }
    } catch (PDOException $e) {
        echo "Connection failed". $e;
    }
}
?>

<form method = 'POST'>
    Name:
    <input type = 'text' name = 'name'>
    <br></br>
    Email:
    <input type = 'email' name = 'email'>
    <br></br>
    <button type = 'submit'>Submit</button>
</form>
<?php
require_once 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, mobile, password)
        VALUES (:username, :mobile, :password)";

$stmt = $conn->prepare($sql);

$stmt->execute([
    ':username' => $username,
    ':mobile' => $_POST['mobile'],
    ':password' => $hashedPassword
]);

echo "User registered successfully";

?>
<form   method="POST">
    Username: <input type="text" name="username" required><br>
    Mobile: <input type="text" name="mobile" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
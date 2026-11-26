<?php

session_start();

require_once 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE name = :username";

    $stmt = $conn->prepare($sql);
    $stmt->execute([':username' => $username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['logged_in'] = true;

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "Invalid username or password";
    }
}
?>

<form method="POST">
    <input type="text" name="username"
           placeholder="Username" required>

    <input type="password" name="password"
           placeholder="Password" required>

    <button type="submit">Login</button>

    <p><?php echo htmlspecialchars($error) ?></p>
</form>
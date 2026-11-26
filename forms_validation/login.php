<?php
session_start();

// After successful username/password verification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!empty($username) && !empty($password)) {
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php");
    } else {
        echo "Enter username and password";
    }
}
?>

<form method = 'POST'>
    Username:
    <input type = 'text' name = 'username'>
    Password:
    <input type = 'password' name = 'password'>

    <button type = 'submit'>Login</button>
</form>
<?php

session_start();

// Check authentication
if (empty($_SESSION['logged_in'])) {

    header("Location: login.php");
    exit;
}

?>

<h2>
    Welcome <?= htmlspecialchars($_SESSION['username']) ?>
</h2>

<a href="logout.php">Logout</a>
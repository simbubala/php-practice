<?php
session_start();
if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: logout.php");
    exit;
}
?>
<form method = 'POST'>
<h2>Welcome to Dashboard</h2>
<p>This page is accessable only to logged in users.</p>
<button type = 'submit'>Logout</button>
</form>
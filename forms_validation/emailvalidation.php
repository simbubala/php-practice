<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    if (empty($email)) {
        echo "Email should not be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("Please enter valid email");
    } else {
        echo "Submitted";
    }
}
?>
<form method = 'POST'>
    Email:
    <input type = 'email' name = 'email' placeholder = 'Enter email'>
    <button type = 'submit'>submit</button>
</form>
<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirm_password']);
    if (empty($email)) {
        echo "Email should not be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("Please enter valid email");
    } elseif (empty($password)) {
        echo "Password should not be empty";
    } elseif(empty($confirmpassword)) {
        echo "Confirm password should not be empty";
    } else {
        if ($password === $confirmpassword) {
            echo "Registration Successfull";
        } else {
            echo "Password and Confirm Password do not match";
        }
    }
}
?>
<form method = 'POST'>
    Email:
    <input type = 'email' name = 'email' placeholder = 'Enter email'><br></br>
    Password:
    <input type = 'password' name='password' placeholder = 'Enter password'><br></br>
    Confirm Password:
    <input type = 'password' name='confirm_password' placeholder = 'Enter password again'><br></br>
    <button type = 'submit'>submit</button>
</form>
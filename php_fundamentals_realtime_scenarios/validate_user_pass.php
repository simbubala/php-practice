<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
     $username = $_POST['username'];
     $password = $_POST['password'];
if (empty($username) || empty($password)) {
  echo "Username and Password are required";
}
else {
  echo "Login Form submitted successfully";
}
}

?>
<form method = "POST">
username:
<input type = "text" name= "username">
password:
<input type = "password" name = "password">
<button type = "submit"> Login </button>
</form>
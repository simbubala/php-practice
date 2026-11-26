<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
if (empty($name)) {
  echo "Name is required";
} elseif(preg_match("/^[a-zA-Z ]*$/", $name) === 0) {
  echo "Name should only contain letters and spaces";
} elseif (empty($email)) {
  echo "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
} elseif (empty($mobile)) {
  echo "Mobile number is required";
} elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
  echo "Mobile number should be a valid 10-digit number";
} elseif (empty($password)) {
  echo "Password is required";
} elseif (strlen($password) < 6) {
  echo "Password should be at least 6 characters long";
} else {
  echo "Registration Form submitted successfully";
}
}
?>


<form method = "POST">
Name:
<input type = "text" name= "name">
Email:
<input type = "email" name= "email">
Mobile:
<input type = "text" name= "mobile">
Password:
<input type = "password" name= "password">
<button type = "submit"> Register </button>
</form>
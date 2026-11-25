<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
     $email = trim($_POST['email']);
if (empty($email)) {
  echo "Email is required";
} elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
} else {
    echo "Email Form submitted successfully";
}
}
?>
<form method = 'POST'>
    Email:
    <input type = "text" name="email">
    <button type = "submit" name="submit">
        Submit
</button>
</form>
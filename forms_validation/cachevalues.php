<?php
$name = "";
$email = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    if (empty($name)) {
        $error = "Name is required";
    } elseif (empty($email)) {
        $error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter valid email";
    } else {
        echo "Registration Successfull";
        exit;
    }
}
?>

<form method = 'POST'>
Name:    
    <input type = 'text' name = 'name' value = "<?php echo htmlspecialchars($name) ?>">
    <br></br>
Email:
    <input type = 'email' name = 'email' value = "<?php echo htmlspecialchars($email) ?>">
    <br></br>
    <button type = 'submit'>Submit</button>
<p style='color:red;'><?php echo htmlspecialchars($error) ?> </p>
</form>



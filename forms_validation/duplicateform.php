<?php
session_start();
if (empty($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['form_token']) || !hash_equals($_SESSION['form_token'], $_POST['form_token'])) {
        die("Duplicate form submission detected!");
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    unset($_SESSION['form_token']);
    echo "Form Submitted";
    header('Location: success.php');
    exit;
}
?>
<form method = 'POST' action="">
    <input type = "text" name = 'name' placeholder='Enter name' required>
    <input type = "email" name = 'email' placeholder = 'Enter email' required>
    <input type='hidden' name='form_token' value="<?php echo htmlspecialchars($_SESSION['form_token']); ?>">
    <button type="submit">Submit</button>
</form>
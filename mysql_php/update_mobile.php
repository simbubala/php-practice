<?php

try {

    $conn = new PDO(
        "mysql:host=localhost;dbname=student;charset=utf8mb4",
        "root",
        "root"
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $userId = $_POST['user_id'] ?? '';
        $mobile = trim($_POST['mobile'] ?? '');

        if (!preg_match('/^[0-9]{10}$/', $mobile)) {

            echo "Please enter a valid 10-digit mobile number";

        } else {

            // Update query
            $sql = "UPDATE users SET mobile = :mobile WHERE id = :id";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                ':mobile' => $mobile,
                ':id' => $userId
            ]);

            if ($stmt->rowCount() > 0) {
                echo "Mobile number updated successfully";
            } else {
                echo "No record updated. User may not exist or the number is unchanged.";
            }
        }
    }

} catch (PDOException $e) {

    echo "Database error: " . $e->getMessage();

}

?>

<form method="POST">

    <label>User ID:</label>
    <input type="number" name="user_id" required>

    <br><br>

    <label>New Mobile Number:</label>
    <input type="text" name="mobile" required>

    <br><br>

    <button type="submit">Update Mobile</button>

</form>
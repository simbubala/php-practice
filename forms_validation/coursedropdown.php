<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=student;charset=utf8mb4","root","root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT id,course_name FROM courses WHERE status = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Database error" . $e);
}
?>
<form method = 'POST'>
    <label>Select Course:</label>
        <select name="course_id" required>
            <option value=''>-- Select the course --</option>
            <?php foreach($courses as $course) { ?>
                <option value="<?php echo $course['id']; ?>">
                    <?php echo htmlspecialchars($course['course_name']); ?>
                </option>
            <?php } ?>
        </select>

    <button type='submit'>Submit</button>
</form>
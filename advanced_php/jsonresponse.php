<?php
require_once 'db.php';
header('Content-Type: application/json; charset=utf-8');

try {

    $sql = "SELECT name, email, course_id
            FROM student";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'status' => true,
        'message' => 'Student details retrieved successfully',
        'data' => $students
    ]);

} catch (PDOException $e) {

    error_log($e->getMessage());

    http_response_code(500);

    echo json_encode([
        'status' => false,
        'message' => 'Internal server error'
    ]);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_FILES['profile']) || $_FILES['profile']['error'] !== UPLOAD_ERR_OK) {
        die("File upload failed");
    }
    // restrict upload file size to 1MB
    if ($_FILES['profile']['size'] > 1 * 1024 * 1024) {
        echo "File should be less than 1 MB";
    }
    
    $allowedExtensions = ['jpg','jpeg','png'];
    $extension = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));

    // restrict only allowed file extensions
    if (!in_array($extension, $allowedExtensions, true)) {
        die("Only JPG, JPEG and PNG formats  are allowed");
    }
}
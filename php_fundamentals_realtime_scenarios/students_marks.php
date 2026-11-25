<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $marks = $_POST['marks'];
    if (empty($marks)) {
        echo "Marks are required";
    }
    switch ($marks) {
        case ($marks >= 90):
            echo "Grade: A";
            break;
        case ($marks >= 80):
            echo "Grade: B";
            break;
        case ($marks >= 70):
            echo "Grade: C";
            break;
        case ($marks >= 60):
            echo "Grade: D";
            break;
        default:
            echo "Grade: F";
    }
}
?>
<form method = "POST">
Marks:
<input type = "number" name= "marks">
<button type = "submit"> Submit </button>
</form>
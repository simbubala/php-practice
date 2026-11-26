<?php

$students = [
    ["name" => "Arun", "age" => 20, "marks" => 85],
    ["name" => "Bala", "age" => 21, "marks" => 75],
    ["name" => "Kumar", "age" => 19, "marks" => 90],
    ["name" => "Ravi", "age" => 22, "marks" => 80]
];

foreach ($students as $student) {
    if ($student['marks'] > 80) {
        echo "Name: " . $student['name'] .
             ", Marks: " . $student['marks'] . "<br>";
    }
}

?>
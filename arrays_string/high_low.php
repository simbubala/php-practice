<?php
$students = array(
    "Simbu" => 85,
    "Vijay" => 92,
    "Ajith" => 78,
    "Dhanush" => 95
);

$highestScore = max($students);
$lowestScore = min($students);
echo "Highest Score: " . $highestScore . "<br>";
echo "Lowest Score: " . $lowestScore;
?>
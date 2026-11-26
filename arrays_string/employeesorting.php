<?php
$employees = [
    ["name" => "Sridhar", "salary" => 50000],
    ["name" => "Kumar", "salary" => 30000],
    ["name" => "Raj", "salary" => 70000],
    ["name" => "Arun", "salary" => 40000]
];

usort($employees, function ($a, $b) {
    return $b['salary'] <=> $a['salary'];
});
echo "Employees sorted by salary in descending order:\n";
foreach ($employees as $employee) {
    echo "Name: " . $employee['name'] . ", Salary: " . $employee['salary'] . "\n";
}
?>
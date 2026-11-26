<?php
$arr1 = array(1, 2, 3, 4, 5);
$arr2 = array(4, 5, 6, 7, 8);
$commonElements = array_intersect($arr1, $arr2);
if (!empty($commonElements)) {
    echo "Common elements: " . implode(", ", $commonElements);
} else {
    echo "No common elements found.";
}
?>
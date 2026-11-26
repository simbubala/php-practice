<?php
$str = "madam";
$reversedStr = strrev($str);
if ($str === $reversedStr) {
    echo "$str is a palindrome.";
} else {
    echo "$str is not a palindrome.";
}
?>
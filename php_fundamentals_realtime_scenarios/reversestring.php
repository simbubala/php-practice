<?php
$strings = "Silambarasan";
$reversedString = "";
for ($i = strlen($strings) - 1; $i >= 0; $i--) {
    $reversedString .= $strings[$i];
}
echo $reversedString;
?>
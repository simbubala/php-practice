<?php
$mobile = "+91 98765-43210";

$cleanMobile = preg_replace('/[^0-9]/', '', $mobile);

echo $cleanMobile;

?>
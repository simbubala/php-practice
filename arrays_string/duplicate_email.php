<?php
$emails = array(
    "john@example.com",
    "alice@example.com",
    "bob@example.com",
    "john@example.com" // This is a duplicate
);
$uniqueEmails = array_unique($emails);
echo "Unique Emails: <br>";
foreach ($uniqueEmails as $email) {
    echo $email . "<br>";
}
?>
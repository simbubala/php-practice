<?php

$paragraph = "PHP is easy to learn. PHP is a popular programming language.";
$words = str_word_count($paragraph, 1);
$wordCount = [];

foreach ($words as $word) {
    $wordCount[$word] = ($wordCount[$word] ?? 0) + 1;
}

print_r($wordCount);

?> 
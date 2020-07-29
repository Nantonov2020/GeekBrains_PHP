<?php
function translate($text) {
    return strtr($text, " ", "_");
}

$myText = "На этой строке будем тренироваться!";
echo translate($myText);
?>
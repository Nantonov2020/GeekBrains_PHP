<?php

function encrypt($text){
    $salt = "84h2b692e5";
    return $salt.md5($text).$salt;
}

?>
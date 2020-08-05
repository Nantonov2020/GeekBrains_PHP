<?php

const SERVER = "localhost";
const DB = "geekbranis_php_na";
const USER = "root";
const PASS = "";

$connect = mysqli_connect(SERVER, USER, PASS, DB) or die("Error of connect.");

?>
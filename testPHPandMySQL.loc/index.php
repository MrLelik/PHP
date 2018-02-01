<?php

$connect = new mysqli('localhost','root','','dbname');
if ($connect->connect_errno) {
    die('Sorry! Database connection error.');
}



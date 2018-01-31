<?php

$link = mysqli_connect("localhost", "root", "", "test_db");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT name FROM people";
$result = mysqli_query($link, $query);


while (false !== ($row = mysqli_fetch_array($result))) {
    echo $row['name'];
    echo '<br>';
}

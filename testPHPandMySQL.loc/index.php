<?php

$connect = new mysqli('localhost','root','','dbname');
if ($connect->connect_errno) {
    die('Sorry! Database connection error.');
}


$a = 'abc54f';


function myIntval($val)
{
    $i = 0;
    $num = null;
    $newVal = $val . '';
    $arrNum = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    while ($newVal{$i}) {
        foreach ($arrNum as $value) {
            if ($newVal{$i} == $value) {
                $num .= $value;
            }
        }
        $i++;
    }
    return $num + 0;
}

$result = myIntval($a);
echo $result;
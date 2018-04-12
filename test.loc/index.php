<?php

require_once 'function.php';

function myArray_unique($arr)
{
    $resultArr = [];

    foreach ($arr as $value) {
        $count = 0;
        foreach ($resultArr as $item) {
            if ($value == $item) {
                $count++;
            }
        }
        if ($count == 0) {
            $resultArr[] = $value;
        }
    }
    return $resultArr;
}


$someArr = [3, 4, 5, 9, 10, 1, 3, 5, 3, 4, 9, 9];

$result = myArray_unique($someArr);
echo '<pre>';
print_r($result);
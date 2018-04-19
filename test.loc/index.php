<?php


function myMin(&$arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] > $arr[$j]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
    }
    return $arr[0];
}

$someArr = [5, 9, 6, 4, 0, 1, 7, 2, 8, 3];
echo '<pre>';
print_r(myMin($someArr));

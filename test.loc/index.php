<?php

require_once 'function.php';

function myArray_merge($arr1, $arr2)
{
    $resultArr = $arr1;

    foreach ($arr2 as $key2 => $value2) {
        $newKey = $key2 . '';
        $val = $value2;
        $flag = true;
        $count = 0;

        foreach ($resultArr as $key1 => $value1) {

            if ($newKey === $key1) {
                $resultArr[$key1] = $arr2[$key2];
                $flag = false;
            } elseif ((count($resultArr) == ($count + 1)) && $flag) {
                $resultArr[] = $val;
            }
            $count++;
        }
    }
    return $resultArr;
}

$a = ['hello', 'my' => 'world'];
$b = ['banana', 'kokos','my' => 'laim'];

$result = myArray_merge($a, $b);

echo '<pre>';
print_r($result);
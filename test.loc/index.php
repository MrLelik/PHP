<?php

function myMax($arr)
{
    $count = count($arr);
    $max = $arr[0];

    for ($i = 0; $i <= $count; $i++) {
        if ($max > $arr[$i]) {
            $max = $arr[$i];
        }
    }
    return $max;
}

$arrNumbers = [];

for ($i = 0; $i <= 10; $i++) {
    $arrNumbers[] = random_int(0, 20);
}
print_r($arrNumbers);
echo '<br>';

$result = myMax($arrNumbers);
echo $result;
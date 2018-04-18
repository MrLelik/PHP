<?php

//Реализуйте самостоятельно функцию:
//array_key_exists()


//array_keys()


//array_combine()


//array_search()


//in_array()


//array_diff()


//array_intersect()


//sort()


//max()*
function myMax($arr)
{
    $count = count($arr);
    $max = $arr[0];

    for ($i = 0; $i <= $count; $i++) {
        if ($max < $arr[$i]) {
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
insertBr();

$result = myMax($arrNumbers);
echo $result;

//min()*


//round()*
function myRound($int)
{
    $i = 0;
    $int = (string) $int;
    $arr = [];
    $result = null;

    while (isset($int{$i})) {
        $arr[] = $int{$i};
        $i++;
    }

    foreach ($arr as $key => $value) {
        if ($value == '.') {
            if ($arr[$key + 1] >= 5) {
                return (int) ++$result;
            } else {
                return (int) $result;
            }
        } else {
            $result .= $arr[$key];
        }
    }
}

$someInt = 55.7;

$result = myRound($someInt);
echo $result;

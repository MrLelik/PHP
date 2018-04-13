<?php

function myRound($int)
{
    $i = 0;
    $int .= '';
    $arr = [];
    $result = null;

    while (isset($int{$i})) {
        $arr[] = $int{$i};
        $i++;
    }

    foreach ($arr as $key => $value) {
        if ($value == '.') {
            if ($arr[$key + 1] >= 5) {
                return $result + 1;
            } else {
                return $result + 0;
            }
        } else {
            $result .= $arr[$key];
        }
    }
}

$someInt = 55.8;

$result = myRound($someInt);
echo $result;
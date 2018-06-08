<?php

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
<?php

//Реализуйте самостоятельно функцию:
//array_key_exists()
function myArray_key_exists($k, $arr)
{
    foreach ($arr as $key => $value) {
        if ($k === $key) {
            return true;
        }
    }
    return false;
}


$someArr = ['find' => 'hello', 'hi' => 'some', 'fff' => 'asd', 5, 7];

$result = myArray_key_exists('find', $someArr);
var_dump($result);
echo '<br>';


//array_keys()
function myArray_keys($arr, $search_value = null)
{
    $result = [];
    $value = ($search_value) ? $search_value : null;

    if (isset($value)) {
        foreach ($arr as $key => $item) {
            if ($item == $value) {
                $result[] = $key;
            }
        }
    } else {
        foreach ($arr as $key => $item) {
            $result[] = $key;
        }
    }

    return $result;
}


$someArr = ['black', 4, 5, 10, 'black', 'first' => 'hello', 'fff' => 'some', 'world'];

$result = myArray_keys($someArr, 'black');
echo '<pre>';
print_r($result);
echo '<br>';


//array_combine()
function myArray_combine($keys, $values)
{
    foreach ($keys as $key => $value) {
        $keys[$value] = $values[$key];
        unset($keys[$key]);
    }
    return $keys;
}


$arr1 = ['a', 'b', 'c', 'd'];
$arr2 = ['Hello', 'my', 'name', 'is'];

$result = myArray_combine($arr1, $arr2);
echo '<pre>';
print_r($result);
echo '<br>';


//array_search()
function myArray_search($find, $arr)
{
    foreach ($arr as $key => $value) {
        if ($value == $find) {
            return $key;
        }
    }
    return false;
}


$someArr = ['blue', 'red', 'green', 'red'];
var_dump(myArray_search('red', $someArr));
echo '<br>';


//in_array()
function myIn_array($find, $arr, $flag = false)
{
    if ($flag) {
        foreach ($arr as $key => $value) {
            if ($value === $find) {
                return true;
            }
        }
    } else {
        foreach ($arr as $key => $value) {
            if ($value == $find) {
                return true;
            }
        }
    }

    return false;
}


$someArr = ['blue', 'red', 'green', 'red', '12', '15'];
var_dump(myIn_array(12, $someArr, true));
echo '<br>';


//array_diff()
function myArray_diff($arr1, $arr2)
{
    $result = [];

    foreach ($arr1 as $value) {
        $i = 0;
        foreach ($arr2 as $item) {
            if ($value == $item) {
                $i++;
            }
        }
        if ($i == 0) {
            $result[] = $value;
        }
    }
    return $result;
}

$someArr1 = ['blue', 'red', 'green', 'black','red', '12', '15', '20'];
$someArr2 = ['blue', 'red', 'green','red', '12', '15'];

$result = myArray_diff($someArr1, $someArr2);
echo '<pre>';
print_r($result);


//array_intersect()
function myArray_intersect($arr1, $arr2)
{
    $result = [];

    foreach ($arr1 as $key => $value) {
        $i = 0;
        foreach ($arr2 as $item) {
            if ($value == $item) {
                $i++;
            }
        }
        if ($i > 0) {
            $result[$key] = $value;
        }
    }
    return $result;
}

$someArr1 = ['a' => 'blue', 'red', 'c' => 'green', 'black','red', '12', '15', '20'];
$someArr2 = ['blue', 'red', 'green','red', '12', '15'];

$result = myArray_intersect($someArr1, $someArr2);
echo '<pre>';
print_r($result);
echo '<br>';


//sort()
function mySort(&$arr)
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
    return $arr;
}

$someArr = [5, 9, 6, 4, 1, 7, 2, 8, 3];
echo '<pre>';
print_r(mySort($someArr));
echo '<br>';


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
echo '<br>';

$result = myMax($arrNumbers);
echo $result;
echo '<br>';


//min()*
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
echo '<br>';


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
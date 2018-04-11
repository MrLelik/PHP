<?php

function insertBr()
{
    echo '<br>' . '<br>';
}

//Реализуйте самостоятельно функцию:
//strlen()
insertBr();
echo '<b>' . 'Задание 1 strlen' . '</b>';
insertBr();


function myStrlen($str)
{
    $i = 0;
    while ($str{$i}) {
        $i++;
    }
    return $i;
}

$someString = 'Hello';

echo $someString;
insertBr();

$result = myStrlen($someString);
echo $result;


//Реализуйте самостоятельно функцию:
//empty()
insertBr();
echo '<b>' . 'Задание 2 empty' . '</b>';
insertBr();


function myEmpty($var)
{
    return $var ? true : false;
}


//Реализуйте самостоятельно функцию:
//trim()
insertBr();
echo '<b>' . 'Задание 3 trim' . '</b>';
insertBr();


function myTrim(&$str)
{
    $i = 0;
    if ($str{0} == ' ') {
        $str{0} = '';
    }

    while ($str{$i}) {
        if (!$str[$i + 1] && $str{$i} == ' ') {
            $str{$i} = '';
        }
        $i++;
    }
    return $str;
}

$someString = ' Hello ';
echo myTrim($someString);


//Реализуйте самостоятельно функцию:
//intval()
insertBr();
echo '<b>' . 'Задание 4 intval' . '</b>';
insertBr();


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
            } elseif ($newVal{$i} == '.') {
                return $num + 0;
            }
        }
        $i++;
    }
    return $num + 0;
}


$int = '354.56';
$result = myIntval($int);
var_dump($result);


//Реализуйте самостоятельно функцию:
//implode()
insertBr();
echo '<b>' . 'Задание 5 implode' . '</b>';
insertBr();


function myImplode($del = null ,$arr)
{
    $str = null;
    $i = 0;
    foreach ($arr as $value) {
        if ($arr[$i + 1]) {
            $str .= $value . $del;
        } else {
            $str .= $value;
        }
        $i++;
    }
    return $str;
}

$someArr = ['Hello', 'world', 'Hi'];

$result = myImplode('-' ,$someArr);
echo $result;


//Реализуйте самостоятельно функцию:
//explode()
insertBr();
echo '<b>' . 'Задание 6 explode' . '</b>';
insertBr();


function myExplode($del, $str)
{
    $resultArr = [];
    $word = null;
    $i = 0;
    $j = 0;

    while ($str{$i}) {
        $word .= $str{$i};

        if ($str{$i} == $del || !$str{$i + 1}) {
            while ($word{$j}) {
                if ($word{$j} == $del) {
                    $word{$j} = '';
                }
                $j++;
            }
            $resultArr[] = $word;
            $word = null;
            $j = 0;
        }
        $i++;
    }
    return $resultArr;
}

$someString = 'Hello-my-World-Explode';

$result = myExplode('-', $someString);
echo '<pre>';
print_r($result);


//Реализуйте самостоятельно функцию:
//array_merge()
insertBr();
echo '<b>' . 'Задание 7 array_merge' . '</b>';
insertBr();


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

//Реализуйте самостоятельно функцию:
//array_unique()
insertBr();
echo '<b>' . 'Задание 8 array_unique' . '</b>';
insertBr();
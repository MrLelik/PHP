<?php

function insertBr()
{
    echo '<br>' . '<br>';
}

//1. Перевод в верхний регистр средствами пхп.
// Создайте переменную со словом в нижнем регистре
// (пример $string = ‘hello’) выведите на экран фразу в верхнем регистре.
echo '<b>' . 'Задание 1' . '</b>';
insertBr();


$string = 'hello';
echo strtoupper($string);


//2. Перевод числа из метров в километры.
// Создайте переменную с числовым значением,
// и выведите на экран это число конвертированное в километры.
insertBr();
echo '<b>' . 'Задание 2' . '</b>';
insertBr();


function convectKm(int $meter)
{
    return ($meter >= 0) ? $meter * 0.001 : false;
}

echo convectKm(random_int(0, 10000));


//3. Создайте три сайта произвольного названия.
// У каждого сайта должен быть свой домен.
// Создайте для каждого конфиг-файлы в АПАЧ
insertBr();
echo '<b>' . 'Задание 3' . '</b>';
insertBr();

echo 'Add domens: TRUE';

//4. *** Напишите функцию которая будет принимать на вход два числа,
// и будет выводить на экран болшее.
insertBr();
echo '<b>' . 'Задание 4' . '</b>';
insertBr();


function maxNum(int $num1 ,int $num2)
{
    return ($num1 > $num2) ? $num1 : $num2;
}

$int1 = random_int(0, 100);
$int2 = random_int(0, 100);

echo $int1 . ' ' . $int2 . '<br>';
$result = maxNum($int1, $int2);
echo $result;

//5. *** Напишите функцию, которая примет на вход массив,
// и выведет самое большое число
insertBr();
echo '<b>' . 'Задание 5' . '</b>';
insertBr();


function maxNumInArr($arr)
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
    $arrNumbers[$i] = random_int(0, 20);
}
print_r($arrNumbers);
insertBr();

$result = maxNumInArr($arrNumbers);
echo $result;

//6. *** Задание со звездочкой,
// вывести в браузер “ряд фибоначчи”
insertBr();
echo '<b>' . 'Задание 6' . '</b>';
insertBr();

function fib($n)
{
    $result = [1, 1];

    for($i = 2; $i <= $n; $i++ ) {
        $result[] = $result[$i-1] + $result[$i-2];
    }
    return $result;
}
echo '<pre>';
print_r(fib(5));
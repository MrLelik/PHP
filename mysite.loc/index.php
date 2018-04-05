<?php

function insertBr()
{
    echo '<br>' . '<br>';
}

//Реализуйте самостоятельно функции:
//strlen()
function myStrlen($str)
{
    return count(str_split($str));
}

$string = 'Hello ';
print_r(myStrlen($string));

//empty()
function myEmpty($var)
{
    return $var ? true : false;
}

//trim()


//intval()


//implode()


//explode()


//array_merge()


//array_unique()

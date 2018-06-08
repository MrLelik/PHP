<?php

function calk()
{

    if ($_POST) {
        $num1 = $_POST['val1'];
        $num2 = $_POST['val2'];
        $operand = $_POST['operand'];
    }

    switch ($operand) {
        case '-':
            return $num1 - $num2;
            break;
        case '*':
            return $num1 * $num2;
            break;
        case '/':
            return $num1 / $num2;
            break;
        case '+':
            return $num1 + $num2;
            break;
        default:
            return 'Error';
            break;
    }
}
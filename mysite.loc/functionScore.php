<?php

function getProduct()
{
    $arr = [];
    for ($i = 1; $i <= 6; $i++) {
        $arr[] = [
            'title' => 'Товар ' . $i,
            'description' => 'Описание товара ' . $i . ' ,Описание товара ' . $i,
            'price' => '$' . 100 * $i . '.000'
        ];
    }
    return $arr;
}
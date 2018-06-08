<?php

//require_once 'function.php';

function getArticles()
{
    $arr = [];

    for ($i = 0; $i <= 5; $i++) {
        $arr[] = [
            'title' => 'my title' . $i,
            'content' => 'my content' . $i
        ];
    }

    return $arr;
}

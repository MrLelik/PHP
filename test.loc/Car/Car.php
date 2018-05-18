<?php

namespace Car;

abstract class Car
{
    public $brand;
    public $color;
    public $year;

    public function go()
    {
        echo 'go';
    }

    public function stop()
    {
        echo 'stop';
    }

    abstract public function goSto();

}


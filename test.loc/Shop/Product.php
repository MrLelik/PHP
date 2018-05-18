<?php

namespace Shop;

interface Product
{
    public function getName ();

    public function getPrice ();

    public function getWeight ();

    public function getColor ();
}
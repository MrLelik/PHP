<?php

namespace Shop;

class Fruit implements Product
{
    public $nameFruit;
    public $priceFruit;
    public $weightFruit;
    public $colorFruit;


    public function __construct($name, $price, $weight, $color)
    {
        $this->nameFruit = $name;
        $this->priceFruit = $price;
        $this->weightFruit = $weight;
        $this->colorFruit = $color;
    }

	public function getName()
	{
		// TODO: Implement getName() method.
	}

	public function getPrice()
	{
		// TODO: Implement getPrice() method.
	}

	public function getWeight()
	{
		// TODO: Implement getWeight() method.
	}

	public function getColor()
	{
		// TODO: Implement getColor() method.
	}
}

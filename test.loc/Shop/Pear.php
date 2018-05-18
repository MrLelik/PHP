<?php
/**
 * Created by PhpStorm.
 * Usertest: lelik
 * Date: 14.05.18
 * Time: 20:34
 */

class Pear extends Fruit
{
    protected $dateOfReceiving;

    /**
     * @return mixed
     */
    public function getDateOfReceiving()
    {
        return $this->dateOfReceiving;
    }

    /**
     * @param mixed $dateOfReceiving
     */
    public function setDateOfReceiving($dateOfReceiving): void
    {
        $this->dateOfReceiving = $dateOfReceiving;
    }
}
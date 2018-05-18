<?php
/**
 * Created by PhpStorm.
 * Usertest: lelik
 * Date: 14.05.18
 * Time: 20:18
 */

class Apple extends Fruit
{
    protected $appleSort;

    /**
     * @return mixed
     */
    public function getAppleSort()
    {
        return $this->appleSort;
    }

    /**
     * @param mixed $appleSort
     */
    public function setAppleSort($appleSort): void
    {
        $this->appleSort = $appleSort;
    }


}
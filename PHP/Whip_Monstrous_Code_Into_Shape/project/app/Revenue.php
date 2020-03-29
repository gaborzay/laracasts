<?php

namespace App;


class Revenue
{
    private int $revenue;

    /**
     * Performance constructor.
     * @param $revenue
     */
    public function __construct(int $revenue)
    {
        $this->revenue = $revenue; // 8600
    }

    public function inDollars()
    {
        return $this->revenue / 100; // 86
    }

    public function asCurrency()
    {
        return printf('$%i', $this->inDollars()); // $86.00
    }

    public function __toString()
    {
        return (string) $this->asCurrency();
    }
}

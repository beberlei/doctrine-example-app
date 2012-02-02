<?php

namespace CarDealer\Inheritance;

/**
 * @Entity
 * @Table(name="joined_car")
 */
class Car extends Vehicle
{
    /** @Column(type="boolean") */
    protected $isTaxi = false;
}


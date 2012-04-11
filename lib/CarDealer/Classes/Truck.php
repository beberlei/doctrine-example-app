<?php

namespace CarDealer\Inheritance;

/**
 * @Entity
 * @Table(name="joined_truck")
 */
class Truck extends Vehicle
{
    /** @Column(type="integer") */
    protected $length;
}


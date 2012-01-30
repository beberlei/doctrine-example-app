<?php

namespace CarDealer\Inheritance;

/**
 * @Entity
 * @Table(name="joined_bike")
 */
class Bike extends Vehicle
{
    /** @Column(type="boolean") */
    protected $hasTrunk;
}


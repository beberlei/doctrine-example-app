<?php

namespace CarDealer\Inheritance;

/**
 * @Entity
 * @Table(name="joined_vehicle")
 * @InheritanceType("JOINED")
 * @DiscriminatorMap({
 *  "bike": "Bike",
 *  "car": "Car",
 *  "truck": "Truck"
 * })
 */
abstract class Vehicle extends \CarFramework\BaseObject
{
    /** @Column(type="integer") @Id @GeneratedValue **/
    protected $id;
    /** @Column(type="string") **/
    protected $offer;
    /** @Column(type="integer") **/
    protected $price;
    /** @Column(type="integer") **/
    protected $kilometres;
    /** @Column(type="date") **/
    protected $admission;

    /** @ManyToOne(targetEntity="Make") */
    protected $make;
}


<?php

namespace CarDealer\Entity;

/**
 * @Entity
 * @Table("vehicle")
 */
class Vehicle extends \CarFramework\BaseObject
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
}


<?php

namespace CarDealer\Entity;

/**
 * @Entity
 * @Table(name="images")
 */
class Image extends \CarFramework\BaseObject
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="text")
     */
    protected $ascii;
}

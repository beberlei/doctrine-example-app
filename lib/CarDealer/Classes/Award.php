<?php

namespace CarDealer\Entity;

/**
 * @Entity
 * @Table(name="awards")
 */
class Award extends \CarFramework\BaseObject
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     */
    protected $name;
}

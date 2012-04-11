<?php

namespace CarDealer\Entity;

/**
 * @Entity
 * @Table(name="make")
 */
class Make extends \CarFramework\BaseObject
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     */
    protected $label;
}

<?php

namespace CarDealer\Inheritance;

/**
 * @Entity
 * @Table(name="joined_make")
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

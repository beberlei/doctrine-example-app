<?php

namespace CarDealer\Basic;

/**
 * @Entity
 */
class Vehicle
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

    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get offer.
     *
     * @return offer.
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * Set offer.
     *
     * @param offer the value to set.
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get price.
     *
     * @return price.
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set price.
     *
     * @param price the value to set.
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get kilometres.
     *
     * @return kilometres.
     */
    public function getKilometres()
    {
        return $this->kilometres;
    }

    /**
     * Set kilometres.
     *
     * @param kilometres the value to set.
     */
    public function setKilometres($kilometres)
    {
        $this->kilometres = $kilometres;
    }
    
    /**
     * Get admission.
     *
     * @return admission.
     */
    public function getAdmission()
    {
        return $this->admission;
    }

    /**
     * Set admission.
     *
     * @param DateTime $admission admission the value to set.
     */
    public function setAdmission(\DateTime $admission)
    {
        $this->admission = $admission;
    }
}


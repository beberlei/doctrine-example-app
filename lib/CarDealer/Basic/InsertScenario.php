<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use CarFramework\ConsoleScenario;
use CarDealer\Entity\Vehicle;

class InsertScenario extends ConsoleScenario
{
    /** php console example:basic:insert  */
    public function play(EntityManager $entityManager, array $args)
    {
        $vehicle = new Vehicle;
        $vehicle->setOffer("Brand New Audi A8 for just 80.000 €");
        $vehicle->setPrice(80000);
        $vehicle->setAdmission(new \DateTime( (1980 + rand(0, 32)) . "-01-01"));
        $vehicle->setKilometres(400 * rand(1, 10000));

        $entityManager->persist($vehicle);
        $entityManager->flush();
    }
}

<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use CarFramework\ConsoleScenario;

class VehicleScenario extends ConsoleScenario
{
    public function play(EntityManager $entityManager, $args)
    {
        $vehicle = new Vehicle();
        $vehicle->setOffer("Brand New Audi A8 for just 80.000 €");
        $vehicle->setPrice(80000);
        $vehicle->setAdmission(new \DateTime("2012-01-01"));
        $vehicle->setKilometres(400);

        $entityManager->persist($vehicle);
        $entityManager->flush();
        $entityManager->clear();

        $vehicle = $entityManager->find('CarDealer\Basic\Vehicle', $vehicle->getId());

        echo "The price is: " . $vehicle->getPrice() . "\n";
    }
}


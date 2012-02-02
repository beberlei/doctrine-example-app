<?php
namespace CarDealer\Inheritance;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputInterface;
use CarFramework\ConsoleScenario;

class VehicleScenario extends ConsoleScenario
{
    public function play(EntityManager $entityManager, InputInterface $input)
    {
        $vehicle = new Car();
        $vehicle->setOffer("Brand New Audi A8 for just 80.000 €");
        $vehicle->setPrice(80000);
        $vehicle->setAdmission(new \DateTime("2012-01-01"));
        $vehicle->setKilometres(400);

        $make = new Make();
        $make->setLabel("Audi");
        $vehicle->setMake($make);

        $entityManager->persist($vehicle);
        $entityManager->persist($make);

        $this->tick("flush");
        $entityManager->flush();
        $this->tick("flush");

        $entityManager->clear();

        $vehicle = $entityManager->find('CarDealer\Inheritance\Vehicle', $vehicle->getId());

        echo "The price is: " . $vehicle->getPrice() . "\n";
    }
}


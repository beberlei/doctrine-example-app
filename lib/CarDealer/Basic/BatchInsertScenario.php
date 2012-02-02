<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputInterface;
use CarFramework\ConsoleScenario;

class BatchInsertScenario extends ConsoleScenario
{
    public function play(EntityManager $entityManager, InputInterface $input)
    {
        for ($i = 0; $i < 50000; $i++) {
            $vehicle = new Vehicle();
            $vehicle->setOffer("Brand New Audi A8 for just 80.000 €");
            $vehicle->setPrice(1000 * ($i % 100));
            $vehicle->setAdmission(new \DateTime( (1980 + rand(0, 32)) . "-01-01"));
            $vehicle->setKilometres(400 * rand(1, 10000));

            $entityManager->persist($vehicle);
            if ($i % 1000 == 0) {
                $entityManager->flush();
                $entityManager->clear();
            }
        }

        $entityManager->flush();
        $entityManager->clear();
    }
}


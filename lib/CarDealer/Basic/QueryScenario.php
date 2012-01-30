<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputInterface;
use CarFramework\ConsoleScenario;

class QueryScenario extends ConsoleScenario
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
        }

        $entityManager->flush();
        $entityManager->clear();

        $query = "SELECT count(v.id) FROM CarDealer\Basic\Vehicle v WHERE v.price > ?1 AND v.admission > ?2 AND v.kilometres < 50000";
        $result = $entityManager->createQuery($query)
                                ->setParameter(1, 30000)
                                ->setParameter(2, new \DateTime("2007-04-01"))
                                ->getSingleScalarResult();

        echo "I have found " . $result . " vehicles matching the description.\n";
    }
}


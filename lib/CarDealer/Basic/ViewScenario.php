<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use CarFramework\ConsoleScenario;

class ViewScenario extends ConsoleScenario
{
    /** php console example:basic:view <id> */
    public function play(EntityManager $entityManager, array $args)
    {
        if (count($args) == 0) {
            throw new \InvalidArgumentException("One parameter 'ID' is expected.");
        }
        $id = $args[0];

        // 1. get entity from database
        // 2. show entity details
        $vehicle = $entityManager->find('CarDealer\Entity\Vehicle', $id);
        if (!$vehicle) {
            echo "Not found";
            return;
        }

        echo "The price is: " . $vehicle->getPrice() . "\n";
    }
}


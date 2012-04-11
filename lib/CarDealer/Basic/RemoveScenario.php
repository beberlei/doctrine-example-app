<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use CarFramework\ConsoleScenario;

class RemoveScenario extends ConsoleScenario
{
    /** php console example:basic:remove <id> */
    public function play(EntityManager $entityManager, array $args)
    {
        if (count($args) == 0) {
            throw new \InvalidArgumentException("One parameter 'ID' is expected.");
        }
        $id = $args[0];
        echo "Delete Entity with ID $id\n";

        // 1. grab entity from database
        // 2. delete entity
    }
}


<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputInterface;
use CarFramework\ConsoleScenario;

class RemoveScenario extends ConsoleScenario
{
    /** php console example:basic:remove <id> */
    public function play(EntityManager $entityManager, InputInterface $input)
    {
        $args = $input->getArgument("args");
        if (count($args) == 0) {
            throw new \InvalidArgumentException("Eine ID wird als Parameter erwartet!");
        }
        $id = $args[0];
        echo "Loesche Entitaet mit ID $id\n";

        // 1. entity aus datenbank holen
        // 2. entity löschen
    }
}


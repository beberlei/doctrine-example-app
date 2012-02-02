<?php
namespace CarDealer\Basic;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Input\InputInterface;
use CarFramework\ConsoleScenario;

class UpdateScenario extends ConsoleScenario
{
    /** php console example:basic:update <id> price 20000 */
    public function play(EntityManager $entityManager, InputInterface $input)
    {
        $args = $input->getArgument("args");
        if (count($args) != 3) {
            throw new \InvalidArgumentException("Ein Parameter ID, 'feldName' und 'value' wird erwartet.");
        }
        echo "Update Entitaet mit ID $id#$name auf wert $value\n";
        $method = "set" . $args[0];
        $value = $args[1];

        // 1. entity aus datenbank holen

        $object->$method($value);
    }
}


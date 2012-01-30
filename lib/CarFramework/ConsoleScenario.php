<?php

namespace CarFramework;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class ConsoleScenario extends Command
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    protected function configure()
    {
        $parts = explode("\\", str_replace("_", "\\", get_class($this)));
        $name = str_replace("Scenario", "", array_pop($parts));
        $group = array_pop($parts);

        $this->setName(strtolower("example:$group:$name"));
        $this->setDescription("Testcommand");
        $this->addArgument('args', InputArgument::OPTIONAL | InputArgument::IS_ARRAY);
    }

    final protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = new \CarFramework\ConsoleSQLLogger();
        $this->em->getConfiguration()->setSQLLogger($logger);

        $args = $input->getArguments();
        $this->play($this->em, $args['args']);

        $logger->flush($output);
    }

    /**
     * Play the scenario
     *
     * @param EntityManager $entityManager
     */
    abstract public function play(EntityManager $entityManager, $args);
}


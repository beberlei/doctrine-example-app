<?php

namespace CarFramework\Tests;

use CarFramework\TestCase;

class ConsoleScenarioTest extends TestCase
{
    public function testExecute()
    {
        $input = $this->getMock('Symfony\Component\Console\Input\InputInterface');
        $output = $this->getMock('Symfony\Component\Console\Output\OutputInterface');

        $command = $this->getMock('CarFramework\ConsoleScenario', array(), array($this->entityManager));
        $command->setName("cmd");
        $command->run($input, $output);
    }
}


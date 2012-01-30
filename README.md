# Doctrine Example App

A simple CarDealer example to show various mapping scenarios and Doctrine features.

It runs completly on the command-line and integrates an SQL toolbar that shows queries whenever they are executed.

You can write new commands by extending a simple class:

    <?php
    namespace CarDealer\Basic;

    use Doctrine\ORM\EntityManager;
    use Symfony\Component\Console\Input\InputInterface;
    use CarFramework\ConsoleScenario;

    class VehicleScenario extends ConsoleScenario
    {
        public function play(EntityManager $entityManager, InputInterface $input)
        {
            // your testcode here
        }
    }

Command names are automatically detected from the namespace+class name, however they are just simple Symfony Console commands. You can extend the `configure` method. See the docs for more information: http://symfony.com/doc/2.0/components/console.html

To run a console command just call to see the help and a list of all the commands

    bash> php console

Also there is a sample scenario:

    bash> php console example:basic:vehicle

To shup the SQL Logging messages up just run with the -q flag.

    bash> php console example:basic:vehicle -q

## Installation

Just clone this repository then call composer to grab all the dependencies:

    php bin/composer.phar install


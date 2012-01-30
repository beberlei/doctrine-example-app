<?php

namespace CarFramework;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $entityManager;

    protected function setUp()
    {
        if ( ! isset($GLOBALS['EXAMPLE_CONFIG'])) {
            $configFile = __DIR__ . "/../../config.yml-dist";
        } else {
            $configFile = $GLOBALS['EXAMPLE_CONFIG'];
        }
        $this->entityManager = \CarFramework\Application::bootstrap($configFile);
    }
}


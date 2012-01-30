<?php

require_once "vendor/.composer/autoload.php";

$configFile = __DIR__ . "/config.yml";
if ( ! file_exists($configFile)) {
    $configFile = __DIR__ . "/config.yml-dist";
}

$entityManager = \CarFramework\Application::bootstrap($configFile);

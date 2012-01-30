<?php

namespace CarFramework;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;

class Application
{
    public static function bootstrap($configFile)
    {
        $dbParams = Yaml::parse($configFile);
        $isDevMode = true;

        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../CarDealer"), $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

        if ($dbParams['driver'] == "pdo_sqlite" && isset($dbParams['memory'])) {
            $schemaTool = new SchemaTool($entityManager);
            $schemaTool->createSchema($entityManager->getMetadataFactory()->getAllMetadata());
        }

        return $entityManager;
    }
}

<?php

namespace CarFramework;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;

class Application
{
    public static function bootstrap($configFile, $isDevMode = true, $cache = null)
    {
        $dbParams = Yaml::parse($configFile);

        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../CarDealer/Entity"), $isDevMode, null, $cache);
        $entityManager = EntityManager::create($dbParams, $config);

        if ($dbParams['driver'] == "pdo_sqlite" && isset($dbParams['memory'])) {
            $schemaTool = new SchemaTool($entityManager);
            $schemaTool->createSchema($entityManager->getMetadataFactory()->getAllMetadata());
        }

        return $entityManager;
    }
}

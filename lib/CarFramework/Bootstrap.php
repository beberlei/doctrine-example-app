<?php

namespace CarFramework;

class Application
{
    public static bootstrap($configFile)
    {
        $dbParams = Yaml::parse($configFile);
        $isDevMode = true;

        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/lib/CarDealer"), $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

        if ($dbParams['driver'] == "pdo_sqlite" && isset($dbParams['memory'])) {
            $schemaTool = new SchemaTool($entityManager);
            $schemaTool->createSchema($entityManager->getMetadataFactory()->getAllMetadata());
        }

        return $entityManager;
    }
}

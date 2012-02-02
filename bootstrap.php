<?php

require_once "vendor/.composer/autoload.php";

$configFile = __DIR__ . "/config.yml";
if ( ! file_exists($configFile)) {
    $configFile = __DIR__ . "/config.yml-dist";
}

$cache = new \Doctrine\Common\Cache\ArrayCache();
/*$memcache = new \Memcache();
$memcache->connect('127.0.0.1');
$cache = new \Doctrine\Common\Cache\MemcacheCache();
$cache->setMemcache($memcache);*/

$entityManager = \CarFramework\Application::bootstrap($configFile, true, $cache);


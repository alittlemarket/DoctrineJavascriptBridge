<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 12:00
 */
//bootstrap-doctrine.php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$useArrayCache                   = true;
$annotationMetadataConfiguration = Setup::createAnnotationMetadataConfiguration(
    array(__DIR__ . "/src"),
    $useArrayCache
);

$databaseConfiguration           = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'doctrineJsBridge',
);

return EntityManager::create($databaseConfiguration, $annotationMetadataConfiguration);

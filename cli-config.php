<?php
/**
 * Created by PhpStorm.
 * User: Sylvain Artois
 * Date: 01/04/14
 * Time: 12:12
 */
//cli-config.php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = require_once "bootstrap-doctrine.php";

return ConsoleRunner::createHelperSet($entityManager);

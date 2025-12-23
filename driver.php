<?php

use Psr\Container\ContainerInterface;
use Kipchak\Driver\Config\Driver;

/**
 * @var $container ContainerInterface
 */

Driver::initialise($container);
Driver::set();
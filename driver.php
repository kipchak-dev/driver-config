<?php

use Psr\Container\ContainerInterface;
use Mamluk\Kipchak\Driver\Config\Driver;

/**
 * @var $container ContainerInterface
 */

Driver::initialise($container);
Driver::set();
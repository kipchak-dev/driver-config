<?php

use Psr\Container\ContainerInterface;
use Mamluk\Kipchak\Driver\Http\Driver;

/**
 * @var $container ContainerInterface
 */

Driver::initialise($container);
Driver::set();
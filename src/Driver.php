<?php

namespace Kipchak\Driver\Config;

use Kipchak\Core\Interfaces;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use function Kipchak\Core\config;

class Driver implements Interfaces\Driver
{
    protected static ContainerInterface $container;

    public static function initialise(ContainerInterface $container): void
    {
        self::$container = $container;
    }

    public static function set(): void
    {
        self::$container->set('drivers.config', function(ContainerInterface $c): array {
            $configPath = realpath(__DIR__ . '/../../../../config/');

            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));
            $routes = array_keys(array_filter(iterator_to_array($iterator), function($file) {
                return $file->isFile();
            }));
            $config = [];
            foreach ($routes as $route) {
                if (str_contains($route, '.php')) {
                    $name = basename(str_replace('.php', '', $route));
                    $config[$name] = config($name);
                }
            }
            return $config;
        });
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function get(?string $configKey = null): array
    {
        $config = self::$container->get('drivers.config');
        if ($configKey === null) {
            return $config;
        } else {
            return $config[$configKey] ?? [];
        }
    }

}
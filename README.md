# Config Driver for Kipchak

This driver is a Config management driver for Kipchak.

It is bundled into Kipchak and does not need to be installed separately.

#### Composer Package 

`kipchak/driver-config`

#### Sample Config File:

This driver does not require any configuration.

## How to use it?

Install it via composer: `composer require kipchak/driver-config`.

### Example Usage

```php
// Load the Config driver.
$config = \Mamluk\Kipchak\Driver\Config\Config::get('file_name_without_extension');
// $config is now the loaded config array.
```

## What is a Kipchak Driver?

Kipchak Drivers are used to connect Kipchak to various data sources or storage systems. 

They provide a standardized interface for interacting with different data sources, allowing developers to 
focus on building their applications rather than dealing with the complexities of each data source.

Drivers were introduced as a part of the Kipchak 2.0 release.

Drivers are basically Container Dependencies injected into Kipchak's Service Container.

## How do Kipchak Drivers work?

Some Kipchak drivers are wired into the Service Container via a config file (where required).

If applicable, you will find a sample config file in this repository as well as in the starter project at https://1x.ax/mamluk/kipchak/starter.

Each driver defines an implementation of Kipchak's Driver Interface. Where applicable, the dependency may 
accept a parameter for a specific instance of the driver specified as a config property, for instance, in the case 
of multiple database connections or S3 buckets.

So you may access the driver by invoking \Mamluk\Kipchak\Driver\Memcached\Memcached::get('cache'), where 
`cache` is the name of one of the memcached connection pools specified in the config file.
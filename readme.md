# Phapi Log
Package contains a Di Container Validator for validating loggers.

## Logger configuration
**Loggers must be PSR-3 compatible.** If no logger is configured or if the configured logger doesn't comply with PSR-3 then the <code>NullLogger</code> that is supplied in the PSR-3 package will be used.

In this example we will configure and use [Monolog](https://github.com/Seldaek/monolog) and set up a simple logger that logs to a file.

First, add the needed dependency to composer.json:
```shell
$ composer require monolog/monolog:1.*
```

After that it's just a matter of updating the configuration:

```php
<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$container['log'] = function ($container) {
    $log = new Logger('default');

    // IMPORTANT! Make sure you use an absolute path. Relative paths aren't guaranteed to
    // work in cases where errors and exceptions occur.
    $log->pushHandler(new StreamHandler(__DIR__ . '/../logs/logfile.log', Logger::WARNING));
    return $log;
};
```

Usage:
```php
<?php
// add records to the log
$container['log']->warning('Foo');
$container['log']->error('Bar');
```

## License
Phapi Log is licensed under the MIT License - see the [license.md](https://github.com/phapi/log/blob/master/license.md) file for details

## Contribute
Contribution, bug fixes etc are [always welcome](https://github.com/phapi/log/issues/new).

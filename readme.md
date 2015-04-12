# Phapi Log
Package contains a Di Container Validator for validating loggers.

## Logger configuration
**Loggers must be PSR-3 compatible.** If no logger is configured or if the configured logger doesn't comply with PSR-3 then the <code>NullLogger</code> that is supplied in the PSR-3 package will be used.

In this example we will configure and use [Monolog](https://github.com/Seldaek/monolog) and set up a simple logger that logs to a file.

```php
<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$phapi = new \Phapi\Phapi();

$phapi['log'] = function ($container) {
    $log = new Logger('default');
    $log->pushHandler(new StreamHandler('../logs/logfile.log', Logger::WARNING));
    return $log;
};
```

Usage:
```php
<?php
// add records to the log
$phapi['log']->warning('Foo');
$phapi['log']->error('Bar');
```

## License
Phapi Log is licensed under the MIT License - see the [license.md](https://github.com/phapi/log/blob/master/license.md) file for details

## Contribute
Contribution, bug fixes etc are [always welcome](https://github.com/phapi/log/issues/new).
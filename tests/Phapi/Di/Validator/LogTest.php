<?php

namespace Phapi\Tests\Container\Validator;

use Phapi\Di\Validator\Log;
use Psr\Log\NullLogger;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * @coversDefaultClass \Phapi\Di\Validator\Log
 */
class LogTest extends TestCase
{

    public $validator;
    public $container;

    public function setUp()
    {
        $this->container = \Mockery::mock('Phapi\Contract\Di\Container');

        $this->validator = new Log($this->container);
    }

    public function testValidLoggerCallable()
    {
        $callable = function () {
            return new NullLogger();
        };

        $return = $this->validator->validate($callable);
        $this->assertSame($callable, $return);
    }

    public function testValidLoggerNotCallable()
    {
        $logger = new NullLogger();

        $return = $this->validator->validate($logger);
        $this->assertSame($logger, $return);
    }

    public function testInvalidLogger()
    {
        $return = $this->validator->validate(new \stdClass());
        $this->assertInstanceOf('\Psr\Log\NullLogger', $return($this->container));
    }
}
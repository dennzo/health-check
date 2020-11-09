<?php

namespace Dennzo\Test\Monitoring\Util;

use Dennzo\Monitoring\Model\HealthCheckRequest;
use Dennzo\Monitoring\Util\EnvironmentDetector;
use PHPUnit\Framework\TestCase;

/**
 * Class EnvironmentDetectorTest
 * @package Dennzo\Test\Monitoring\Util
 */
class EnvironmentDetectorTest extends TestCase
{
    public function test_environment_variable_detector_with_app_env_on_superglobal_server()
    {
        $_SERVER['APP_ENV'] = 'foo84739';
        self::assertEquals('foo84739', EnvironmentDetector::provideEnvironment());

        unset($_ENV['APP_ENV']);
        unset($_SERVER['APP_ENV']);
    }

    public function test_environment_variable_detector_with_app_env_on_superglobal_env()
    {
        $_ENV['APP_ENV'] = 'foo64243';
        self::assertEquals('foo64243', EnvironmentDetector::provideEnvironment());

        unset($_ENV['APP_ENV']);
        unset($_SERVER['APP_ENV']);
    }

    public function test_environment_variable_detector_with_symfony_env_on_superglobal_server()
    {
        $_SERVER['SYMFONY_ENV'] = 'foo23511';
        self::assertEquals('foo23511', EnvironmentDetector::provideEnvironment());

        unset($_ENV['SYMFONY_ENV']);
        unset($_SERVER['SYMFONY_ENV']);
    }

    public function test_environment_variable_detector_with_symfony_env_on_superglobal_env()
    {
        $_ENV['SYMFONY_ENV'] = 'foo53547';
        self::assertEquals('foo53547', EnvironmentDetector::provideEnvironment());

        unset($_ENV['SYMFONY_ENV']);
        unset($_SERVER['SYMFONY_ENV']);
    }

    public function test_environment_variable_detector_with_application_env_on_superglobal_server()
    {
        $_SERVER['APPLICATION_ENV'] = 'foo86492';
        self::assertEquals('foo86492', EnvironmentDetector::provideEnvironment());

        unset($_ENV['APPLICATION_ENV']);
        unset($_SERVER['APPLICATION_ENV']);
    }

    public function test_environment_variable_detector_with_application_env_on_superglobal_env()
    {
        $_ENV['APPLICATION_ENV'] = 'foo48547';
        self::assertEquals('foo48547', EnvironmentDetector::provideEnvironment());

        unset($_ENV['APPLICATION_ENV']);
        unset($_SERVER['APPLICATION_ENV']);
    }

    public function test_environment_variable_detector_with_invalid_env_on_superglobal_server()
    {
        $_SERVER['WHATEVER_ENV'] = 'foo86492';
        self::assertEquals('dev', EnvironmentDetector::provideEnvironment());

        unset($_ENV['WHATEVER_ENV']);
        unset($_SERVER['WHATEVER_ENV']);
    }

    public function test_environment_variable_detector_with_invalid_env_on_superglobal_env()
    {
        $_ENV['WHATEVER_ENV'] = 'foo48547';
        self::assertEquals('dev', EnvironmentDetector::provideEnvironment());

        unset($_ENV['WHATEVER_ENV']);
        unset($_SERVER['WHATEVER_ENV']);
    }

    public function test_environment_variable_with_overridden_superglobal_variable_server()
    {
        $_SERVER['FOO'] = 'BAR';
        $request = (new HealthCheckRequest())->setEnvironmentVariableName('FOO');
        self::assertEquals('BAR', EnvironmentDetector::provideEnvironment($request->getEnvironmentVariableName()));

        unset($_ENV['FOO']);
        unset($_SERVER['FOO']);
    }
}

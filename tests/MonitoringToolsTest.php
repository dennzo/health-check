<?php

namespace Dennzo\Test\Monitoring;

use Dennzo\Monitoring\Model\HealthCheckRequest;
use Dennzo\Monitoring\MonitoringTools;
use Dennzo\Monitoring\Util\GitDetector;
use PHPUnit\Framework\TestCase;

/**
 * Class MonitoringToolsTest
 * @package Dennzo\Test\Monitoring
 */
class MonitoringToolsTest extends TestCase
{
    public function test_monitoring_tools_as_object()
    {
        $response = MonitoringTools::provideHealthCheckAsObject($this->getRequest());

        self::assertEquals('OK', $response->getStatus());
        self::assertEquals('dev', $response->getEnvironment());
        self::assertEquals('13.3.7', $response->getVersion());
        self::assertEquals('test', $response->getApplicationName());
    }

    public function test_monitoring_tools_as_json()
    {
        $response = MonitoringTools::provideHealthCheckAsJson($this->getRequest());

        $responseAsArray = json_decode($response, true);
        self::assertEquals('OK', $responseAsArray['status']);
        self::assertEquals('13.3.7', $responseAsArray['version']);
        self::assertEquals('dev', $responseAsArray['environment']);
        self::assertEquals('test', $responseAsArray['applicationName']);
    }



    private function getRequest()
    {
        return (new HealthCheckRequest())
            ->setStatus('OK')
            ->setVersion('13.3.7')
            ->setApplicationName('test')
            ->setEnvironment('dev');
    }
}

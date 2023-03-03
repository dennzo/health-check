<?php
/*
 * The MIT License (MIT)
 * Copyright (c) 2020 Dennis Barlowe
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Dennzo\Monitoring;

use Dennzo\Monitoring\Mapper\HealthCheckMapper;
use Dennzo\Monitoring\Model\HealthCheckRequest;
use Dennzo\Monitoring\Model\HealthCheckResponse;

/**
 * Class MonitoringTools
 * @package Dennzo\Monitoring
 */
final class MonitoringTools
{
    /**
     * You can also get the object directly as a json string.
     *
     * The parameter $healthCheckRequest is optional, because it can also be generated automatically.
     */
    public static function provideHealthCheckAsJson(?HealthCheckRequest $healthCheckRequest = null): string
    {
        $healthCheckResponse = MonitoringTools::provideHealthCheckAsObject($healthCheckRequest);

        return json_encode($healthCheckResponse);
    }

    /**
     * This method provides basic information about an instance.
     * Hereby a basic status, which environment and what version is deployed.
     *
     * The parameter $healthCheckRequest is optional, because it can also be generated automatically.
     */
    public static function provideHealthCheckAsObject(?HealthCheckRequest $healthCheckRequest = null): HealthCheckResponse
    {
        $mapper = new HealthCheckMapper();

        if (null === $healthCheckRequest) {
            // @codeCoverageIgnoreStart
            $healthCheckRequest = new HealthCheckRequest();
            // @codeCoverageIgnoreEnd
        }

        return $mapper->map($healthCheckRequest);
    }
}

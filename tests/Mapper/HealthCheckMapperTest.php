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

namespace Mapper;

use Dennzo\Monitoring\Mapper\HealthCheckMapper;
use Dennzo\Monitoring\Model\HealthCheckRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class HealthCheckMapperTest
 * @package Mapper
 */
class HealthCheckMapperTest extends TestCase
{
    public function test_mapper()
    {
        $mapper = new HealthCheckMapper();

        $request = new HealthCheckRequest();
        $request->setApplicationName('foo');
        $request->setEnvironment('test');
        $request->setVersion('1.0');
        $request->setEnvironmentVariableName('FOO');

        $response = $mapper->map($request);

        self::assertEquals('OK', $response->getStatus());
        self::assertEquals('foo', $response->getApplicationName());
        self::assertEquals('1.0', $response->getVersion());
        self::assertEquals('test', $response->getEnvironment());
    }
}

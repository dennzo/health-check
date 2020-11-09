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

namespace Dennzo\Monitoring\Mapper;

use Dennzo\Monitoring\Model\HealthCheckRequest;
use Dennzo\Monitoring\Model\HealthCheckResponse;
use Dennzo\Monitoring\Util\CommandChecker;
use Dennzo\Monitoring\Util\EnvironmentDetector;
use Dennzo\Monitoring\Util\GitDetector;

/**
 * Class HealthCheckMapper
 * @package Dennzo\Monitoring\Mapper
 */
class HealthCheckMapper
{
    /**
     * @var HealthCheckRequest
     */
    private $request;

    /**
     * @var HealthCheckResponse
     */
    private $response;

    /**
     * @param HealthCheckRequest $request
     * @return HealthCheckResponse
     */
    public function map(HealthCheckRequest $request)
    {
        $this->request = $request;

        $this->response = (new HealthCheckResponse())
            // Setting the defaults. Will be overridden below if a healthCheckRequest is provided and filled
            ->setStatus('OK')
            ->setEnvironment(false);

        $this->mapVersion();
        $this->mapApplicationName();
        $this->mapEnvironment();
        $this->mapStatus();


        return $this->response;
    }

    /**
     * @return void
     */
    private function mapVersion()
    {
        if ($this->request->hasVersion()) {
            $this->response->setVersion($this->request->getVersion());
            // @codeCoverageIgnoreStart
        } elseif (CommandChecker::commandExist('git')) {
            $this->response->setVersion(GitDetector::getTag());
            // @codeCoverageIgnoreEnd
        }
    }

    /**
     * @return void
     */
    private function mapApplicationName()
    {
        if ($this->request->hasApplicationName()) {
            $this->response->setApplicationName($this->request->getApplicationName());
            // @codeCoverageIgnoreStart
        } elseif (CommandChecker::commandExist('git')) {
            $this->response->setApplicationName(GitDetector::getApplicationName());
            // @codeCoverageIgnoreEnd
        }
    }

    /**
     * @return void
     */
    private function mapEnvironment()
    {
        if ($this->request->hasEnvironment()) {
            $this->response->setEnvironment($this->request->getEnvironment());
        } else {
            // @codeCoverageIgnoreStart
            $variableName = ($this->request->hasEnvironmentVariableName()) ? $this->request->getEnvironmentVariableName() : null;
            $this->response->setEnvironment(EnvironmentDetector::provideEnvironment($variableName));
            // @codeCoverageIgnoreEnd
        }
    }

    private function mapStatus()
    {
        if ($this->request->hasStatus()) {
            $this->response->setStatus($this->request->getStatus());
        }
    }
}

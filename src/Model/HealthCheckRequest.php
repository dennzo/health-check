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

namespace Dennzo\Monitoring\Model;

/**
 * Class HealthCheckRequest
 * @package Dennzo\Monitoring\Model
 */
class HealthCheckRequest
{
    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * @var string|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $environment;

    /**
     * @var string|null
     */
    private $environmentVariableName;

    /**
     * @return bool
     */
    public function hasStatus()
    {
        return !empty($this->status);
    }

    /**
     * @return bool
     */
    public function hasApplicationName()
    {
        return !empty($this->applicationName);
    }

    /**
     * @return bool
     */
    public function hasVersion()
    {
        return !empty($this->version);
    }

    /**
     * @return bool
     */
    public function hasEnvironment()
    {
        return !empty($this->environment);
    }

    /**
     * @return bool
     */
    public function hasEnvironmentVariableName()
    {
        return !empty($this->environmentVariableName);
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return HealthCheckRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     * @return HealthCheckRequest
     */
    public function setApplicationName($applicationName)
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     * @return HealthCheckRequest
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string|null $environment
     * @return HealthCheckRequest
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnvironmentVariableName()
    {
        return $this->environmentVariableName;
    }

    /**
     * @param string|null $environmentVariableName
     * @return HealthCheckRequest
     */
    public function setEnvironmentVariableName($environmentVariableName)
    {
        $this->environmentVariableName = $environmentVariableName;
        return $this;
    }
}

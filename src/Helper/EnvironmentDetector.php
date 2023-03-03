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

namespace Dennzo\Monitoring\Helper;

/**
 * Class EnvironmentDetector
 * @package Dennzo\Monitoring\Util
 */
final class EnvironmentDetector
{
    /**
     * These are all environment variables which are used for automatic detecting the environment.
     * The order of the array is the order in which the variables are checked.
     */
    const ENVIRONMENT_VARIABLES = [
        'APP_ENV',
        'SYMFONY_ENV',
        'APPLICATION_ENV',
    ];

    /**
     * @param string|null $variableName Name of the environment variable to check for in $_SERVER and $_ENV
     * @return string|null
     */
    public static function provideEnvironment(string $variableName = null): ?string
    {
        if (null !== $variableName && (isset($_SERVER[$variableName]) || isset($_ENV[$variableName]))) {
            return $_SERVER[$variableName] = $_ENV[$variableName] = ($_SERVER[$variableName]) ? $_SERVER[$variableName] : $_ENV[$variableName];
        }

        foreach (EnvironmentDetector::ENVIRONMENT_VARIABLES as $name) {
            if (isset($_SERVER[$name]) || isset($_ENV[$name])) {
                return $_SERVER[$name] = $_ENV[$name] = $_SERVER[$name] ?? $_ENV[$name];
            }
        }

        return 'dev';
    }
}

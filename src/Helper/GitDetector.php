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
 * Class GitDetector
 * @package Dennzo\Monitoring\Util
 */
final class GitDetector
{
    public static function getTag(): string
    {
        // get tag
        exec('git describe --tags --abbrev=0', $gitVersion);
        // get commit hash short
        exec('git rev-parse --short HEAD', $gitCommit);

        return $gitVersion[0] ?? $gitCommit[0] ?? '';
    }

    public static function getApplicationName(): ?string
    {
        exec('basename -s .git `git config --get remote.origin.url`', $applicationName);

        return $applicationName[0] ?? null;
    }
}

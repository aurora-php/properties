<?php

declare(strict_types=1);

/*
 * This file is part of the Aurora Project.
 *
 * (c) Tentifly <info@tentifly.com>
 *
 * This file is subject to the MIT license.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Aurora\Properties;

use Traversable;

/**
 * @extends Traversable<string, mixed>
 */
interface PropertySource extends Traversable
{
    /**
     * @param string $key
     *
     * @return bool
     */
    public function contains(string $key): bool;

    /**
     * @param string        $key
     * @param null|callable $converter
     *
     * @return mixed
     */
    public function get(string $key, null|callable $converter = null): mixed;

    /**
     * @return string[]
     */
    public function keySet(): array;

    /**
     * @param string $key
     * @param mixed  $value
     */
    public function set(string $key, mixed $value): void;
}

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

use ArrayIterator;
use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<string, mixed>
 */
final class Properties implements PropertySource, IteratorAggregate
{
    /**
     * @param array<string, mixed> $properties
     */
    public function __construct(
        private array $properties
    ) {}

    /**
     * {@inheritdoc}
     */
    public function contains(string $key): bool
    {
        return \array_key_exists($key, $this->properties);
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $key, null|callable $converter = null): mixed
    {
        $value = $this->properties[$key] ?? null;

        return null === $converter ? $value : $converter($value);
    }

    /**
     * @return Traversable<string, mixed>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->properties);
    }

    /**
     * {@inheritdoc}
     */
    public function keySet(): array
    {
        return array_keys($this->properties);
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $key, mixed $value): void
    {
        $this->properties[$key] = $value;
    }
}

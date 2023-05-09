<?php

namespace Zen\ORM\Core\Interface;

interface CacheInterface
{
    public function get(string $key, mixed $default): mixed;

    public function set(string $key, mixed $value): bool;

    public static function setDir(string $dir): bool;
}
<?php

namespace Test;

use Zen\ORM\Core\Interface\ConfigInterface;

class Config implements ConfigInterface
{
    private array $configs = [];

    public function get(string $key, $default = null): mixed
    {
        return $this->configs[$key] ?? $default;
    }
}
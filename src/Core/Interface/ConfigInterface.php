<?php

namespace Zen\ORM\Core\Interface;

interface ConfigInterface
{
    public function get(string $key, $default = null): mixed;
}
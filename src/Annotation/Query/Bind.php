<?php

namespace Zen\ORM\Annotation\Query;

#[\Attribute(\Attribute::TARGET_PARAMETER)]
class Bind
{
    public string $name;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }
}
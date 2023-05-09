<?php

namespace Zen\ORM\Annotation;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class WithInject
{
    public string $name;

    public string $key;

    /**
     * @param class-string $name
     */
    public function __construct(string $name = '', string $key = '')
    {
        $this->name = $name;
        $this->key = $key;
    }
}
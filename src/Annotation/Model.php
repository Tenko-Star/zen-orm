<?php

namespace Zen\ORM\Annotation;

use Zen\ORM\Core\Factories\DefaultFactory;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Model
{
    public string $factory;

    public function __construct(string $factory = DefaultFactory::class)
    {
        $this->factory = $factory;
    }
}
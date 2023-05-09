<?php

namespace Zen\ORM\Annotation;

#[\Attribute(\Attribute::TARGET_PROPERTY|\Attribute::TARGET_CLASS)]
class Migration
{
    public string $name;

    public string $type;

    public string $describe;

    public array $settings;

    public function __construct(
        string $name = '', string $type = '', string $describe = '', array $settings = []
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->describe = $describe;
        $this->settings = $settings;
    }
}
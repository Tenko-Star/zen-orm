<?php

namespace Zen\ORM\Annotation;

use Attribute;
use Zen\ORM\Core\Interface\CustomFactoryInterface;

#[Attribute(Attribute::TARGET_PROPERTY)]
/**
 * Model Field Attribute
 */
class Field
{
    use CheckCustomFactory;

    /**
     * @var string $name The name of field
     */
    public string $name;

    /**
     * @template T
     * @template-implements CustomFactoryInterface
     *
     * @var class-string<T>|null
     */
    public ?string $factory;

    /**
     * Model Field Attribute Constructor
     *
     * @template T
     * @template-implements CustomFactoryInterface
     *
     * @param $name
     * @param class-string<T>|null $factory
     */
    public function __construct(string $name, ?string $factory = null)
    {
        $this->name = $name;
        $this->factory = $this->checkCustomFactory($factory);
    }
}
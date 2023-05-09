<?php

namespace Zen\ORM\Annotation;


use Attribute;

/**
 * Model Table Attribute
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Table
{
    public string $table;

    public function __construct(string $name)
    {
        $this->table = $name;
    }
}
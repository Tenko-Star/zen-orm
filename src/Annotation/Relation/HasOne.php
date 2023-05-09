<?php

namespace Zen\ORM\Annotation\Relation;

use Attribute;
use Zen\ORM\Annotation\Relation;

#[Attribute(Attribute::TARGET_PROPERTY)]
class HasOne extends Relation
{
    public string $foreignKey;

    public string $primaryKey;

    public ?string $factory;

    public function __construct(string $foreignKey, string $primaryKey = 'id', ?string $factory = null)
    {
        $this->foreignKey = $foreignKey;
        $this->primaryKey = $primaryKey;
        $this->factory = $this->checkCustomFactory($factory);
    }
}
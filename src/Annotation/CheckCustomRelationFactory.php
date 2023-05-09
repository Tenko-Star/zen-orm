<?php

namespace Zen\ORM\Annotation;

use Zen\ORM\Core\Relation\CustomRelationFactoryInterface;

trait CheckCustomRelationFactory
{
    protected function checkCustomFactory(?string $factory): ?string
    {
        if ($factory === null) {
            return null;
        }

        if (!class_exists($factory)) {
            return null;
        }

        $impl = class_implements($factory);
        if (!isset($impl[CustomRelationFactoryInterface::class])) {
            return null;
        }

        return $factory;
    }
}
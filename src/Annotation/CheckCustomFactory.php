<?php

namespace Zen\ORM\Annotation;

use Zen\ORM\Core\Interface\CustomFactoryInterface;

trait CheckCustomFactory
{
    private function checkCustomFactory(?string $factory): ?string
    {
        if ($factory === null) {
            return null;
        }

        if (!class_exists($factory)) {
            return null;
        }

        $impl = class_implements($factory);
        if (!isset($impl[CustomFactoryInterface::class])) {
            return null;
        }

        return $factory;
    }
}
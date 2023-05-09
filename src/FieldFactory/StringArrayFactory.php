<?php

namespace Zen\ORM\FieldFactory;

use Zen\ORM\Core\Interface\CustomFactoryInterface;
use Zen\ORM\Core\Interface\CustomOutputInterface;

class StringArrayFactory implements CustomFactoryInterface
{

    public static function parse(mixed $data): array
    {
        if (!is_string($data)) {
            return [];
        }

        return explode(',', $data);
    }

    public static function save(CustomOutputInterface|array|null $data): string
    {
        if (!is_array($data)) {
            return '';
        }

        return implode(',', $data);
    }
}
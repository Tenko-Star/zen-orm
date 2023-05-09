<?php

namespace Zen\ORM\Core\Parsers;

use ReflectionProperty;
use Zen\ORM\Core\Info\FieldInfo;
use Zen\ORM\Core\Info\ModelInfo;
use Zen\ORM\Core\Interface\ParserInterface;
use Zen\ORM\Exception\PropertyTypeNotAllowException;

class FieldParser implements ParserInterface
{

    public static function parse(\ReflectionClass $reflectionClass, ModelInfo $info): void
    {
        $props = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $propName = $prop->getName();
            $fieldInfo = new FieldInfo($propName, $propName);
            $info->fieldsMap[$propName] = $fieldInfo;

            $propType = $prop->getType();
            if ($propType instanceof \ReflectionUnionType) {
                throw new PropertyTypeNotAllowException('Union type is unsupported yet.');
            }

            if ($propType === null) {
                $fieldInfo->allowsNull = true;
                $fieldInfo->type = 'mixed';
                continue;
            }

            $fieldInfo->allowsNull = $propType->allowsNull();

            if ($propType->isBuiltin()) {
                $fieldInfo->type = $propType->getName();
            } else {
                $fieldInfo->type = 'object';
                $fieldInfo->instanceOf = $propType->getName();
            }
        }
    }
}
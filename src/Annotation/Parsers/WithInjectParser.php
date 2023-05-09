<?php

namespace Zen\ORM\Annotation\Parsers;

use Zen\ORM\Annotation\WithInject;
use Zen\ORM\Core\Info\ModelInfo;
use Zen\ORM\Core\Interface\ParserInterface;
use Zen\ORM\Exception\ParseException;

class WithInjectParser implements ParserInterface
{

    public static function parse(\ReflectionClass $reflectionClass, ModelInfo $info): void
    {
        $props = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $attrs = $prop->getAttributes(WithInject::class);
            if (empty($attrs)) {
                continue;
            }
            /** @var WithInject $withInject */
            $withInject = $attrs[0]->newInstance();

            $propName = $prop->getName();
            $fieldInfo = $info->fieldsMap[$propName];

            if (!empty($withInject->key)) {
                $fieldInfo->key = $withInject->key;
            }

            if ($fieldInfo->type === 'object' && !empty($fieldInfo->instanceOf)) {
                continue;
            }

            if ($fieldInfo->type !== 'mixed' && $fieldInfo->type !== 'object') {
                throw new ParseException('Type error: WithInject have to used on object or mixed property');
            }

            $fieldInfo->type = 'object';
            $fieldInfo->instanceOf = $withInject->name;

            $info->fieldAttrs[$propName][WithInject::class] = $withInject;
        }
    }
}
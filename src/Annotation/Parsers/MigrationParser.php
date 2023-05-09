<?php

namespace Zen\ORM\Annotation\Parsers;

use Zen\ORM\Annotation\Migration;
use Zen\ORM\Core\Info\FieldInfo;
use Zen\ORM\Core\Info\ModelInfo;
use Zen\ORM\Core\Interface\ParserInterface;
use Zen\ORM\Exception\ParseException;

class MigrationParser implements ParserInterface
{

    public static function parse(\ReflectionClass $reflectionClass, ModelInfo $info): void
    {
        $migAttrs = $reflectionClass->getAttributes(Migration::class);

        if (isset($migAttrs[0])) {
            /** @var Migration $migration */
            $migration = $migAttrs[0]->newInstance();

            $info->tableName = $migration->name;

            $info->tableDescribe = $migration->describe;

            $info->dbSetting = $migration->settings;

            $info->classAttrs[Migration::class] = $migration;
        }

        $props = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($props as $prop) {
            $propName = $prop->getName();
            $propType = $prop->getType();
            $migAttrs = $prop->getAttributes(Migration::class);

            if ($propType instanceof \ReflectionUnionType) {
                throw new ParseException('UnionType is unsupported on property ' . $prop->getName());
            }

            if (isset($migAttrs[0])) {
                /** @var Migration $migration */
                $migration = $migAttrs[0]->newInstance();

                $key = $migration->name ?: $propName;

                $fieldInfo = $info->fieldsMap[$propName];
                $fieldInfo->key = $key;
                $fieldInfo->propName = $propName;
                $fieldInfo->dbSetting = $migration->settings;

                $info->fieldAttrs[$propName][Migration::class] = $migration;
            }
        }
    }
}
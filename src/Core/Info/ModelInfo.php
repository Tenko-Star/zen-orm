<?php

namespace Zen\ORM\Core\Info;

use Zen\ORM\Core\Interface\FactoryInterface;

class ModelInfo
{
    public string $class = '';

    public string $tableName = '';

    public string $tableDescribe = '';

    public array $dbSetting = [];

    /** @var class-string<FactoryInterface> $factory */
    public string $factory = '';

    public array $classAttrs = [];

    public array $fieldAttrs = [];

    /** @var FieldInfo[] $fieldsMap */
    public array $fieldsMap = [];
}
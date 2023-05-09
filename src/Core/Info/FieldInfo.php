<?php

namespace Zen\ORM\Core\Info;

class FieldInfo
{
    /** @var string $key is the name of field in db */
    public string $key;

    /** @var string $propName is name of model property */
    public string $propName;

    public bool $allowsNull;

    public string $type = 'mixed';

    public string $instanceOf;

    public array $dbSetting = [];

    public function __construct(
        string $key, string $propName,
        bool $allowsNull = false,
        string $type = 'mixed',
        string $instanceOf = '',
        array $setting = []
    )
    {
        $this->key = $key;
        $this->propName = $propName;
        $this->allowsNull = $allowsNull;
        $this->type = $type;
        $this->instanceOf = $instanceOf;
        $this->dbSetting = $setting;
    }
}
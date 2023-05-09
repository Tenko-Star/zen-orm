<?php

namespace Zen\ORM\Annotation\Query;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Model
{
    public string $modelClass;

    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
    }
}
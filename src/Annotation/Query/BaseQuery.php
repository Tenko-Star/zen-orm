<?php

namespace Zen\ORM\Annotation\Query;

#[\Attribute]
abstract class BaseQuery
{
    public string $sql;

    public array $bind;

    public function __construct(string $sql, array $bind = [])
    {
        $this->sql = $sql;
        $this->bind = $bind;
    }
}
<?php

namespace Zen\ORM\Annotation\Query;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Where
{
    public int $type;

    public string $field;

    public string $op;

    public string $bind;

    public function __construct(
        string $field,
        string $op = '=',
        string $bind = '',
        int $type = 0,
    ) {
        $this->type = $type;
        $this->field = $field;
        $this->bind = $bind;
        $this->op = $op;
    }
}
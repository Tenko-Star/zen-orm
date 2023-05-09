<?php

namespace Zen\ORM\Core\Query;

use Zen\ORM\Enum\WhereStatementType;
use Zen\ORM\Core\BaseQueryStruct;

class WhereStruct extends BaseQueryStruct
{
    public WhereStatementType $type;

    public string $field;

    public string $op;

    public string $value;

    public function __construct(
        string $field,
        string $op,
        string $value,
        WhereStatementType $type
    ) {
        $this->field = $field;
        $this->op = $op;
        $this->value = $value;
        $this->type = $type;
    }

    public static function createAnd(
        string $field,
        string $op,
        string $value,
    ): self {
        return new self(
            $field,
            $op,
            $value,
            WhereStatementType::AND()
        );
    }

    public static function createOr(
        string $field,
        string $op,
        string $value,
    ): self {
        return new self(
            $field,
            $op,
            $value,
            WhereStatementType::OR()
        );
    }

    public function __toString(): string
    {
        return "$this->field $this->op $this->value";
    }
}
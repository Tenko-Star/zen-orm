<?php

namespace Zen\ORM\Core\Query;

use Zen\ORM\Enum\OrderStatementType;
use Zen\ORM\Core\BaseQueryStruct;

class OrderStruct extends BaseQueryStruct
{
    public string $field;

    public OrderStatementType $type;

    public function __toString(): string
    {
        return $this->field . $this->type->getName();
    }
}
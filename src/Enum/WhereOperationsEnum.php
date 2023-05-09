<?php

namespace Zen\ORM\Enum;

class WhereOperationsEnum
{
    const EQUAL = '=';

    const NOT_EQUAL = '<>';

    const LARGE = '>';

    const LESS = '<';

    const LARGE_EQUAL = '>=';

    const LESS_EQUAL = '<=';

    const IS_NULL = 'IS NULL';

    const IS_NOT_NULL = 'IS NOT NULL';

    const BETWEEN = 'BETWEEN';

    const LIKE_L = '%LIKE';

    const LIKE_R = 'LIKE%';

    const LIKE = '%LIKE%';
}
<?php

namespace Zen\ORM;

use Zen\ORM\Core\ModelParser;
use Zen\ORM\Exception\ORMException;

final class ModelFactory
{
    /**
     * @template T
     * @param class-string<T> $className
     * @param array $data
     * @return T
     * @throws ORMException
     */
    public static function create(string $className, array $data = [], array $ref = [], string $prefix = '')
    {
        $info = ModelParser::getModelInfo($className);

        return call_user_func_array([$info->factory, 'create'], [$info, $data, $ref, $prefix]);
    }
}
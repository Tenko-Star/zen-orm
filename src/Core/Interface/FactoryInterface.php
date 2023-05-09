<?php

namespace Zen\ORM\Core\Interface;

use Zen\ORM\Core\Info\ModelInfo;

/**
 * @template T of object
 */
interface FactoryInterface
{
    /**
     * @param ModelInfo $info
     * @param array $data
     * @param array<class-string, object> $ref
     * @param string $prefix
     * @return T
     */
    public static function create(ModelInfo $info, array $data, array $ref, string $prefix = '');
}
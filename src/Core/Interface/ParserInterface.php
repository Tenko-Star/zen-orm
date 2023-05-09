<?php

namespace Zen\ORM\Core\Interface;

use Zen\ORM\Core\Info\ModelInfo;

interface ParserInterface
{
    public static function parse(\ReflectionClass $reflectionClass, ModelInfo $info): void;
}
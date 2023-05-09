<?php

namespace Zen\ORM\Annotation\Parsers;

use Zen\ORM\Annotation\Model;
use Zen\ORM\Core\Info\ModelInfo;
use Zen\ORM\Core\Interface\ParserInterface;
use Zen\ORM\Exception\ParseException;

class FactoryParser implements ParserInterface
{

    public static function parse(\ReflectionClass $reflectionClass, ModelInfo $info): void
    {
        $constructor = $reflectionClass->getConstructor();
        if ($constructor && count($constructor->getParameters()) > 0) {
            throw new ParseException('Model classes do not allow custom constructors.');
        }

        $annotations = $reflectionClass->getAttributes(Model::class);
        if (count($annotations) > 0) {
            /** @var Model $modelAttr */
            $modelAttr = $annotations[0]->newInstance();
            $info->factory = $modelAttr->factory;

            $info->classAttrs[Model::class] = $modelAttr;
        }
    }
}
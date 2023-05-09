<?php

namespace Zen\ORM\Core;

use Zen\ORM\Annotation\Parsers\FactoryParser;
use Zen\ORM\Annotation\Parsers\MigrationParser;
use Zen\ORM\Annotation\Parsers\WithInjectParser;
use Zen\ORM\Core\Info\ModelInfo;
use Zen\ORM\Core\Interface\ParserInterface;
use Zen\ORM\Core\Parsers\FieldParser;
use Zen\ORM\Exception\ORMException;

class ModelParser
{
    /** @var ModelInfo[] $cache */
    private static array $cache = [];

    /** @var class-string<ParserInterface>[] $parsers */
    private static array $parsers = [
        FactoryParser::class,
        FieldParser::class,
        MigrationParser::class,
        WithInjectParser::class,
    ];

    public static function setCache(array $cache): void
    {
        self::$cache = $cache;
    }

    /**
     * @template T
     * @param class-string<T> $className
     * @return ModelInfo<T>
     * @throws ORMException
     */
    public static function getModelInfo(string $className): ModelInfo
    {
        if (isset(self::$cache[$className])) {
            return self::$cache[$className];
        }

        try {
            $ref = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
            throw new ORMException('Could not parse this model: ' . $e->getMessage(), $e->getCode(), $e);
        }

        $info = new ModelInfo();
        $info->class = $className;

        foreach (self::$parsers as $parser) {
            call_user_func_array([$parser, 'parse'], [$ref, $info]);
        }

        self::$cache[$className] = $info;

        return $info;
    }
}
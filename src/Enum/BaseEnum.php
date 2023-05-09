<?php
declare(strict_types=1);

namespace Zen\ORM\Enum;

/**
 * Base Enum Class
 */
abstract class BaseEnum
{
    protected static array $cache = [];

    protected static array $map = [];

    protected static bool $isInit = false;

    private mixed $value;

    private static function init(): void
    {
        if (static::$isInit) {
            return;
        }

        static::$cache = !empty(static::$cache) ?
            static::$cache :
            (new \ReflectionClass(static::class))->getConstants(\ReflectionClassConstant::IS_PUBLIC);
        static::$map = !empty(static::$map) ?
            static::$map :
            array_flip(static::$cache);
        static::$isInit = true;
    }

    /**
     * @param string $name
     * @param array $args
     * @return BaseEnum|null
     * @throws \Exception
     */
    public static function __callStatic(string $name, array $args)
    {
        static::init();

        if (!isset(static::$cache[$name])) {
            throw new \Exception('Using non-existent enumeration value: ' . $name);
        }

        return new static(static::$cache[$name]);
    }

    public function __construct(mixed $value)
    {
        $this->value = $value;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function getName(): string
    {
        return static::$map[$this->value] ?? '';
    }

    public function equals(mixed $value): bool
    {
        return $this->value === $value;
    }
}
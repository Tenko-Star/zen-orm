<?php

namespace Zen\ORM;

final class DAOFactory
{
    /**
     * @template T
     * @template-implements DAOInterface
     * @param class-string<T> $interface
     * @return T
     */
    public static function create(string $interface): mixed
    {

    }
}
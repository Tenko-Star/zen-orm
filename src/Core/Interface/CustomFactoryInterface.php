<?php

namespace Zen\ORM\Core\Interface;

/**
 * Interface of factory that used to create a custom object
 */
interface CustomFactoryInterface
{
    /**
     * Create a custom object from data.
     *
     * @template T
     *
     * @param T $data
     * @return CustomOutputInterface|array|null
     */
    public static function parse(mixed $data): CustomOutputInterface|array|null;

    /**
     * Converting structured data into data that can be saved in a database.
     *
     * @param CustomOutputInterface|array|null $data
     * @return mixed
     */
    public static function save(CustomOutputInterface|array|null $data): mixed;
}
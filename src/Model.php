<?php

namespace Zen\ORM;

use Zen\ORM\Core\DbManager;

abstract class Model
{
    private static DbManager $db;

    public function __construct(array $data = [])
    {
    }

    public function toSave(): mixed
    {
        return null;
    }

    public static function setDb(DbManager $db)
    {
        static::$db = $db;
    }
}
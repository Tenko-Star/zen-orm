<?php

namespace Zen\ORM\Core;

use Zen\ORM\Core\Interface\CacheInterface;
use Zen\ORM\Core\Interface\ConfigInterface;
use Zen\ORM\Core\Interface\DbInterface;

class DbManager
{
    private static DbInterface $db;

    private static ConfigInterface $config;

    private static CacheInterface $cache;
}
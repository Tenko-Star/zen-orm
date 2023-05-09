<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $config = new Config();
    }
}
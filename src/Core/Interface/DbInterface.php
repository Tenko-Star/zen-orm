<?php

namespace Zen\ORM\Core\Interface;

interface DbInterface
{
    public function select();

    public function find();

    public function insert();

    public function update();

    public function delete();
}
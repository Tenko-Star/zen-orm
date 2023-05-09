<?php

namespace Zen\ORM\Core\Interface;

interface CustomOutputInterface
{
    public function toSave(): mixed;

    public function toArray(): array;

    public function toRelation(): mixed;
}
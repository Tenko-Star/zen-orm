<?php

namespace Zen\ORM\Core;

use Zen\ORM\Exception\CollectionException;

class Collection
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function toArray(): array
    {
        $arr = [];
        foreach ($this->data as $datum) {
            if (is_array($datum)) {
                $arr[] = $datum;
                continue;
            }

            if (is_object($datum) && method_exists($datum, 'toArray')) {
                $arr[] = $datum->toArray();
                continue;
            }

            throw new CollectionException('Could not converses this item to array.');
        }

        return $arr;
    }

    public function each(\Closure $closure): void
    {
        array_walk($this->data, $closure);
    }

    public function reduce(\Closure $closure, $initial = null): array
    {
        return array_reduce($this->data, $closure, $initial);
    }
}
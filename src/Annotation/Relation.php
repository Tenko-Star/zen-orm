<?php

namespace Zen\ORM\Annotation;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
abstract class Relation {
    use CheckCustomRelationFactory;

    /**
     * TODO 需要额外解决一些问题：
     * - 找不到数据时怎么办
     * - 共用一个字段的问题
     */
}
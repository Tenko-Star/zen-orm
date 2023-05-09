<?php

namespace Zen\ORM\Core\Factories;

use Zen\ORM\Core\Info\ModelInfo;
use Zen\ORM\Core\Interface\FactoryInterface;
use Zen\ORM\Exception\PropertyNullException;
use Zen\ORM\ModelFactory;

class DefaultFactory implements FactoryInterface
{

    public static function create(ModelInfo $info, array $data, array $ref, string $prefix = ''): object
    {
        $model = new $info->class;
        foreach ($info->fieldsMap as $propName => $fieldInfo) {
            $key = $prefix . $fieldInfo->key;
            $instanceOf = $fieldInfo->instanceOf;

            if (isset($ref[$instanceOf])) {
                $model->$propName = &$ref[$instanceOf];
                continue;
            }

            $ref[$info->class] = $model;

            if (!array_key_exists($key, $data)) {
                if ($fieldInfo->type === 'object' && !empty($fieldInfo->instanceOf)) {
                    $model->$propName = ModelFactory::create($fieldInfo->instanceOf, $data, $ref, $key . '_');
                    continue;
                }

                if ($fieldInfo->allowsNull) {
                    $model->$propName = null;
                    continue;
                }

                // todo message
                throw new PropertyNullException('');
            }

            if ($fieldInfo->type === 'object' && is_array($data[$key])) {
                $model->$propName = ModelFactory::create($fieldInfo->instanceOf, $data[$key], $ref, '');
                continue;
            }

            $model->$propName = $data[$key];
        }

        return $model;
    }
}
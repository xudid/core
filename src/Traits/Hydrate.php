<?php

namespace Xudid\Core\Traits;

trait Hydrate
{
    public static function hydrate(array $data)
    {
        $object = new static();

        $methods = get_class_methods(__CLASS__);
        $keys = array_keys($data);
        foreach ($keys as $key) {
            $key = strtolower($key);
            $setter = 'set'.ucfirst($key);
            $value = $data[$key];
            if (in_array($setter, $methods)) {
                $object->$setter($value);
            }
        }
        return $object;
    }
}

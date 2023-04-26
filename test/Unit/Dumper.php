<?php

namespace Genkgo\TestCamt\Unit;

use DateTimeImmutable;
use DateTimeZone;
use ReflectionClass;
use ReflectionMethod;

class Dumper
{
    /**
     * @var mixed[]
     */
    private $saw = [];

    /**
     * @param object|mixed[]|string|float|int|bool|null $variable
     * @return string
     */
    public function dump($variable)
    {
        $this->saw = [];
        $a = $this->cast($variable);

        return json_encode($a, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL;
    }

    /**
     * @param object|mixed[]|string|float|int|bool|null $variable
     * @return mixed[]|string|float|int|bool|null
     */
    private function cast($variable)
    {
        if ((is_array($variable) || $variable instanceof \Traversable)) {
            $values = [];
            foreach ($variable as $k => $v) {
                $values[$k] = $this->cast($v);
            }

            return $values;
        }

        if ($variable instanceof DateTimeImmutable) {
            return [
                '__CLASS__' => get_class($variable),
                $variable->setTimezone(new DateTimeZone('UTC'))->format('c'),
            ];
        }

        if (is_object($variable)) {
            $properties = $this->castObject($variable);

            return $this->cast($properties);
        }

        return $variable;
    }

    /**
     * @return mixed[]|string
     * @param object $object
     */
    private function castObject($object)
    {
        $key = spl_object_hash($object);
        if (array_key_exists($key, $this->saw)) {
            return '__RECURSIVITY__';
        }
        $this->saw[$key] = $object;

        $values = $this->getGetterValues($object);
        ksort($values);

        $values = array_merge(['__CLASS__' => get_class($object)], $values);

        return $values;
    }

    /**
     * @param object $object
     * @return mixed[]
     */
    private function getGetterValues($object)
    {
        $class = new ReflectionClass($object);

        $values = [];
        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $name = $method->getName();
            if (strncmp($name, 'get', strlen('get')) === 0) {
                $values[$name] = $method->invoke($object);
            }
        }

        return $values;
    }
}

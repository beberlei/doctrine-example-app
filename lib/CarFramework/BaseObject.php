<?php

namespace CarFramework;

class BaseObject
{
    public function __call($method, $args)
    {
        $property = lcfirst(substr($method, 3));
        if (substr($method, 0, 3) === "get") {
            return $this->$property;
        } else if (substr($method, 0, 3) === "set" && count($args) == 1) {
            $this->$property = $args[0];
        } else {
            throw new \BadMethodCallException("No method ". $method . " on class " . get_class($this));
        }
    }
}


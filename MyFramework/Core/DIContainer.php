<?php

namespace MyFramework\Core;

class DIContainer 
{
    private array $instances = [];

    public function set($key, $object)
    {
        $this->instances[$key] = $object;
    }

    public function get($key)
    {   
        if(!isset($this->instances[$key])){
            throw new Exception("Can't find the instance for key {$key}");
        }

        return $this->instances[$key];
    }
}
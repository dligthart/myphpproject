<?php

namespace MyFramework\Core;

class ServiceLocator
{
    protected static $container = null;

    public static function setContainer(DIContainer $container)
    {
        self::$container = $container;
    }

    public static function get($key) {

        if(self::$container === null) {
            throw new \Exception('Container not found');
        }

        return self::$container->get($key);        
    }
}
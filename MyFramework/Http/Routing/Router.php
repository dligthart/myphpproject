<?php
namespace MyFramework\Http\Routing;

use MyFramework\Core\ServiceLocator as ServiceLocator;
use MyFramework\Http\Request as Request;

class Router 
{
    private array $routes = [];

    public function __construct(){}

    public function addRoute(Route $route) 
    {
        $this->routes[] = $route;
    }

    public function dispatch(): void
    {   
        $request = new Request;
        
        $found = false;

        foreach($this->routes as $route) 
        {   
            $found = $route->getPath() === $request->getPath();
        
            if($found)
            {
                $controller = ServiceLocator::get($route->getControllerClassName());
                $controller->{$route->getControllerClassMethod()}();
                
                die();
            }
        }       
       
        if (!$found) {
            die('<h1>404 - not found</h1>');       
        }
    }
}
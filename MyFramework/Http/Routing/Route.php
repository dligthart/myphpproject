<?php
namespace MyFramework\Http\Routing;

class Route 
{
    public function __construct(
        private string $path,
        private string $controllerClassName,
        private string $controllerClassMethod = 'index'
    ){}

    public function getPath(): string
    {
        return $this->path;
    }

    public function getControllerClassName(): string
    {
        return $this->controllerClassName;
    }

    public function getControllerClassMethod(): string
    {
        return $this->controllerClassMethod;
    }
}
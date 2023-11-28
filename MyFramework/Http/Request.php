<?php

namespace MyFramework\Http;

class Request
{

    public function getPath(): string
    {
        $request = $_SERVER['REQUEST_URI'];

        return explode('?', $request)[0];
    }
}
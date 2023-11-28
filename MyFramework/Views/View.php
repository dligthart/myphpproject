<?php

namespace MyFramework\Views;

class View 
{
    public function __construct(){}

    private static function render(string $view, array $params): string 
    {
        $output = '';
            
        ob_start();
        extract($params);
        include dirname(__FILE__) . '/../../resources/views/' . $view . '.php';
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public static function show(string $view, array $params): void
    {
        echo self::render($view, $params);
    }
}
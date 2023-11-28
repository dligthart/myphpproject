<?php

namespace MyFramework\Controllers;

use MyFramework\Views\View as View;

class IndexController
{
    public function __construct()
    {

    }

    public function index() 
    {
        View::show('home', []);
    }
}
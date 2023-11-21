<?php

namespace MyFramework\Controllers;

class IndexController
{
    public function __construct()
    {

    }

    public function index() 
    {
        echo 'showing index';
    }

    public function posts()
    {
        $db = \MyFramework\Core\ServiceLocator::get('database');
        
        $rows = $db->query('select * from posts');

        echo '<pre>';
        print_r($rows);
    }

}
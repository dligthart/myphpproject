<?php

namespace MyFramework\Controllers;

use MyFramework\Views\View as View;

class PostsController
{
    public function __construct()
    {

    }

    public function index() 
    {
        $db = \MyFramework\Core\ServiceLocator::get('database');
        
        $posts = $db->query('select * from posts');

        View::show('posts', ['posts' => $posts]);
    }

}
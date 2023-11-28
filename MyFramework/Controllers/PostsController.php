<?php

namespace MyFramework\Controllers;

use MyFramework\Views\View as View;
use MyFramework\Models\Post as Post;

class PostsController
{
    public function __construct()
    {

    }

    public function index() 
    {
        $db = \MyFramework\Core\ServiceLocator::get('database');
        
        $rows = $db->query('select * from posts');

        $posts = [];

        foreach($rows as $row) 
        {
            $posts[] = new Post(
                $row['post_id'], 
                $row['post_title'], 
                $row['post_content']
            );
        }

        View::show('posts', ['posts' => $posts]);
    }

}
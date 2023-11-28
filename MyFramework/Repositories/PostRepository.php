<?php
namespace MyFramework\Repositories;

use MyFramework\Models\Post as Post;

class PostRepository
{
    public function getPosts(): array
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

        return $posts;
    }
}
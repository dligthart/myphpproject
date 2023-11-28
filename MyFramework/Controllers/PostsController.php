<?php

namespace MyFramework\Controllers;

use MyFramework\Views\View as View;
use MyFramework\Repositories\PostRepository as PostRepository;

class PostsController
{   
    public function __construct(
        private PostRepository $repository
    ){}

    public function index() 
    {
        View::show('posts', ['posts' => $this->repository->getPosts()]);
    }

}
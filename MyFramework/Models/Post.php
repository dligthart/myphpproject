<?php

namespace MyFramework\Models;

class Post
{
    public function __construct(
        private int $id,
        private string $title,
        private string $content
    ){}

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
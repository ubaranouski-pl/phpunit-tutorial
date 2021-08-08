<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Post;

class PostFactory
{
    /**
     * @return Post
     */
    public function factory(): Post
    {
        $post = new Post();
        $post->setTitle(uniqid('title', false));
        $post->setContent(uniqid('content', false));
        $post->setCategory(uniqid('category', false));
        return $post;
    }
}

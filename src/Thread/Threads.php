<?php

namespace Phpach\Thread;

use Countable;

class Threads implements Countable
{
    /**
     * @var Post[]
     */
    private $posts = [];

    public function __construct(array $posts)
    {
        foreach ($posts as $post) {
            $this->posts = $post;
        }
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->posts);
    }

    /**
     * @return Post[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }
}

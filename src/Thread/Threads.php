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
        $this->setPosts($posts['posts']);
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

    /**
     * @param array $posts
     */
    private function setPosts(array $posts): void
    {
        foreach ($posts as $post) {
            $this->posts[] = new Post($post);
        }
    }
}

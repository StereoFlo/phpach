<?php

declare(strict_types = 1);

namespace Phpach\Thread;

use Countable;
use function count;

class Threads implements Countable
{
    /**
     * @var Post[]
     */
    private $posts = [];

    /**
     * @param array<string, mixed> $posts
     */
    public function __construct(array $posts)
    {
        $this->setPosts($posts['posts']);
    }

    public function count(): int
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
     * @param array<string, mixed> $posts
     */
    private function setPosts(array $posts): void
    {
        foreach ($posts as $post) {
            $this->posts[] = new Post($post);
        }
    }
}

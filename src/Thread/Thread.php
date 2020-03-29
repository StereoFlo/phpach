<?php

namespace Phpach\Thread;

use Countable;

class Thread implements Countable
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $postCount;

    /**
     * @var int
     */
    private $uniquePosters;

    /**
     * @var Threads[]
     */
    private $threads = [];

    public function __construct(string $title, int $postCount, int $uniquePosters, array $threads)
    {

        $this->title = $title;
        $this->postCount = $postCount;
        $this->uniquePosters = $uniquePosters;

        foreach ($threads as $thread) {
            $this->threads[] = new Threads($thread);
        }

    }

    public function count(): int
    {
        return count($this->threads);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPostCount(): int
    {
        return $this->postCount;
    }

    public function getUniquePosters(): int
    {
        return $this->uniquePosters;
    }

    /**
     * @return Threads[]
     */
    public function getThreads(): array
    {
        return $this->threads;
    }
}

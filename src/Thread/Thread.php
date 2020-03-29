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
    private $threads;

    public function __construct(string $title, int $postCount, int $uniquePosters, array $threads)
    {

        $this->title = $title;
        $this->postCount = $postCount;
        $this->uniquePosters = $uniquePosters;

        foreach ($threads as $thread) {
            $this->threads[] = $thread;
        }

    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->threads);
    }
}

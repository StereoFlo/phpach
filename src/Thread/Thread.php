<?php

declare(strict_types = 1);

namespace Phpach\Thread;

use Countable;
use function count;

class Thread implements Countable
{
    /**
     * @var string
     */
    private $boardId;

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

    /**
     * @var string
     */
    private $boardInfo;

    /**
     * @var string
     */
    private $boardName;

    /**
     * @param array<string, mixed> $thread
     */
    public function __construct(array $thread)
    {
        $this->boardId       = $thread['Board'];
        $this->boardInfo     = $thread['BoardInfo'];
        $this->boardName     = $thread['BoardName'];
        $this->title         = $thread['title'];
        if (isset($thread['posts_count'])) {
            $this->uniquePosters = (int) $thread['posts_count'];
        }
        if (isset($thread['unique_posters'])) {
            $this->uniquePosters = (int) $thread['unique_posters'];
        }

        $this->setThreads($thread['threads']);
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

    public function getBoardId(): string
    {
        return $this->boardId;
    }

    public function getBoardInfo(): string
    {
        return $this->boardInfo;
    }

    public function getBoardName(): string
    {
        return $this->boardName;
    }

    /**
     * @param array<string, mixed> $threads
     */
    private function setThreads(array $threads): void
    {
        foreach ($threads as $thread) {
            $this->threads[] = new Threads($thread);
        }
    }
}

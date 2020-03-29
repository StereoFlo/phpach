<?php

namespace Phpach\Threads;

use Countable;

class Board implements Countable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Thread[]
     */
    private $threads = [];

    public function __construct(string $id, array $threads)
    {
        $this->id = $id;
        $this->setThreads($threads);
    }

    /**
     * @param array $threads
     */
    public function setThreads(array $threads): void
    {
        foreach ($threads as $thread) {
            $this->threads[] = new Thread($thread);
        }
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->threads);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Thread[]
     */
    public function getThreads(): array
    {
        return $this->threads;
    }
}

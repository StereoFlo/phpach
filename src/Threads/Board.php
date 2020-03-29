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

    public function count(): int
    {
        return count($this->threads);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getThreads(): array
    {
        return $this->threads;
    }

    private function setThreads(array $threads): void
    {
        foreach ($threads as $thread) {
            $this->threads[] = new Thread($thread);
        }
    }
}

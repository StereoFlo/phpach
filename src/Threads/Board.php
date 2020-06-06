<?php

declare(strict_types = 1);

namespace Phpach\Threads;

use Countable;
use function count;

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

    /**
     * @param array<string, mixed> $threads
     */
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

    /**
     * @return Thread[]
     */
    public function getThreads(): array
    {
        return $this->threads;
    }

    /**
     * @param array<string, mixed> $threads
     */
    private function setThreads(array $threads): void
    {
        foreach ($threads as $thread) {
            $this->threads[] = new Thread($thread);
        }
    }
}

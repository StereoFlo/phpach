<?php

namespace Phpach\Boards;

use Countable;
use function count;

class Category implements Countable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Board[]
     */
    private $threads;

    public function __construct(string $name, array $threads)
    {
        $this->name = $name;

        $this->setThreads($threads);
    }

    /**
     * @param array $threads
     */
    public function setThreads(array $threads): void
    {
        foreach ($threads as $thread) {
            $this->threads[] = new Board($thread);
        }
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->threads);
    }
}

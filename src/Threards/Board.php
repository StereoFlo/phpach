<?php

namespace Phpach\Threards;

use Countable;

class Board implements Countable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var array
     */
    private $threads;

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
}

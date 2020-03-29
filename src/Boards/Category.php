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
    private $boards = [];

    public function __construct(string $name, array $boards)
    {
        $this->name = $name;

        $this->setBoards($boards);
    }

    /**
     * @param array $boards
     */
    public function setBoards(array $boards): void
    {
        foreach ($boards as $thread) {
            $this->boards[] = new Board($thread);
        }
    }

    /**
     * @inheritDoc
     */
    public function count(): int
    {
        return count($this->boards);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Board[]
     */
    public function getBoards(): array
    {
        return $this->boards;
    }
}

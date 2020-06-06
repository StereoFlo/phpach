<?php

declare(strict_types = 1);

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

    /**
     * @param array<string, mixed> $boards
     */
    public function __construct(string $name, array $boards)
    {
        $this->name = $name;

        $this->setBoards($boards);
    }

    public function count(): int
    {
        return count($this->boards);
    }

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

    /**
     * @param array<string, mixed> $boards
     */
    private function setBoards(array $boards): void
    {
        foreach ($boards as $thread) {
            $this->boards[] = new Board($thread);
        }
    }
}

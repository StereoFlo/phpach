<?php

namespace Phpach\Boards;

class Board
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $category;

    /**
     * @var string|null
     */
    private $id;

    public function __construct(array $settings)
    {
        $this->name = $settings['name'] ?? null;
        $this->category = $settings['category'] ?? null;
        $this->id = $settings['id'] ?? null;
    }
}

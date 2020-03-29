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

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
}

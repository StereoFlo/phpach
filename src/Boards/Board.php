<?php

declare(strict_types = 1);

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

    /**
     * @param array<string, mixed> $settings
     */
    public function __construct(array $settings)
    {
        $this->name     = $settings['name'] ?? null;
        $this->category = $settings['category'] ?? null;
        $this->id       = $settings['id'] ?? null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}

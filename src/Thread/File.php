<?php

namespace Phpach\Thread;

class File
{
    /**
     * @var string
     */
    private $displayName;

    /**
     * @var int|null
     */
    private $height;

    /**
     * @var int|null
     */
    private $width;

    /**
     * @var int|null
     */
    private $size;

    /**
     * @var string|null
     */
    private $path;

    /**
     * @var string|null
     */
    private $thumbnail;

    /**
     * @var int|null
     */
    private $type;

    public function __construct(array $file)
    {
        $this->displayName = (string) $file['displayname'] ?? null;
        $this->height      = (int) $file['height'] ?? null;
        $this->width       = (int) $file['width'] ?? null;
        $this->size        = (int) $file['size'] ?? null;
        $this->path        = (string) $file['path'] ?? null;
        $this->thumbnail   = (string) $file['thumbnail'] ?? null;
        $this->type        = (int) $file['type'] ?? null;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }
}

<?php

declare(strict_types = 1);

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

    /**
     * @param array<string, mixed> $file
     */
    public function __construct(array $file)
    {
        if (isset($file['displayname'])) {
            $this->displayName = (string) $file['displayname'];
        }
        if (isset($file['height'])) {
            $this->height = (int) $file['height'];
        }
        if (isset($file['width'])) {
            $this->width = (int) $file['width'];
        }
        if (isset($file['size'])) {
            $this->size = (int) $file['size'];
        }
        if (isset($file['path'])) {
            $this->path = (string) $file['path'];
        }
        if (isset($file['thumbnail'])) {
            $this->thumbnail = (string) $file['thumbnail'];
        }
        if (isset($file['type'])) {
            $this->type = (int) $file['type'];
        }
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }
}

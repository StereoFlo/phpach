<?php

declare(strict_types = 1);

namespace Phpach\Threads;

class Thread
{
    /**
     * @var string|null
     */
    private $comment;

    /**
     * @var string|null
     */
    private $subject;

    /**
     * @var int|null
     */
    private $timestamp;

    /**
     * @var int|null
     */
    private $lasthit;

    /**
     * @var int|null
     */
    private $postsCount;

    /**
     * @var float|null
     */
    private $score;

    /**
     * @var int|null
     */
    private $num;

    /**
     * @var int|null
     */
    private $views;

    /**
     * @param array<string, mixed> $thread
     */
    public function __construct(array $thread)
    {
        if (isset($thread['lasthit'])) {
            $this->lasthit = (int) $thread['lasthit'];
        }
        if (isset($thread['num'])) {
            $this->num = (int) $thread['num'];
        }
        if (isset($thread['posts_count'])) {
            $this->postsCount = (int) $thread['posts_count'];
        }
        if (isset($thread['score'])) {
            $this->score = (float) $thread['score'];
        }
        if (isset($thread['views'])) {
            $this->views  = (int) $thread['views'];
        }
        if (isset($thread['timestamp'])) {
            $this->timestamp = (int) $thread['timestamp'];
        }

        $this->comment    = $thread['comment'] ?? null;
        $this->subject    = $thread['subject'] ?? null;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    public function getLasthit(): ?int
    {
        return $this->lasthit;
    }

    public function getPostsCount(): ?int
    {
        return $this->postsCount;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }
}

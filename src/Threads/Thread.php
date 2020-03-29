<?php

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

    public function __construct(array $thread)
    {
        $this->comment = $thread['comment'] ?? null;
        $this->lasthit = $thread['lasthit'] ?? null;
        $this->num = $thread['num'] ?? null;
        $this->postsCount = $thread['posts_count'] ?? null;
        $this->score = $thread['score'] ?? null;
        $this->subject = $thread['subject'] ?? null;
        $this->timestamp = $thread['timestamp'] ?? null;
        $this->views = $thread['views'] ?? null;
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

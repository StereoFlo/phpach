<?php

namespace Phpach\Threards;

class Thread
{
    private $comment;
    private $subject;
    private $timestamp;
    private $lasthit;
    private $postsCount;
    private $score;
    private $num;
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
}

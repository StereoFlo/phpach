<?php

namespace Phpach\Thread;

class Post
{
    private $lasthit;
    private $name;
    private $banned;
    private $closed;
    private $comment;
    private $date;
    private $num;
    private $number;
    private $parent;
    private $sticky;
    private $subject;
    private $tags;
    private $timestamp;
    private $trip;

    public function __construct(array $post)
    {
        $this->name = $post['name'] ?? null;
        $this->banned = $post['banned'] ?? null;
        $this->closed = $post['closed'] ?? null;
        $this->comment = $post['comment'] ?? null;
        $this->date = $post['date'] ?? null;
        $this->lasthit = $post['lasthit'] ?? null;
        $this->num = $post['num'] ?? null;
        $this->number = $post['number'] ?? null;
        $this->op = $post['op'] ?? null;
        $this->parent = $post['parent'] ?? null;
        $this->sticky = $post['sticky'] ?? null;
        $this->subject = $post['subject'] ?? null;
        $this->tags = $post['tags'] ?? null;
        $this->timestamp = $post['timestamp'] ?? null;
        $this->trip = $post['trip'] ?? null;
    }
}

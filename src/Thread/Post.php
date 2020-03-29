<?php

namespace Phpach\Thread;

class Post
{
    /**
     * @var int|null
     */
    private $lasthit;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var int|null
     */
    private $banned;

    /**
     * @var int|null
     */
    private $closed;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * @var string|null
     */
    private $date;

    /**
     * @var int|null
     */
    private $num;

    /**
     * @var int|null
     */
    private $number;

    /**
     * @var int|null
     */
    private $parent;

    /**
     * @var int|null
     */
    private $sticky;

    /**
     * @var string|null
     */
    private $subject;

    /**
     * @var int|null
     */
    private $tags;

    /**
     * @var int|null
     */
    private $timestamp;

    /**
     * @var string|null
     */
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

    public function getLasthit(): ?int
    {
        return $this->lasthit;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getBanned(): ?int
    {
        return $this->banned;
    }

    public function getClosed(): ?int
    {
        return $this->closed;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function getParent(): ?int
    {
        return $this->parent;
    }

    public function getSticky(): ?int
    {
        return $this->sticky;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function getTags(): ?int
    {
        return $this->tags;
    }

    public function getTimestamp(): ?int
    {
        return $this->timestamp;
    }

    public function getTrip(): ?string
    {
        return $this->trip;
    }
}

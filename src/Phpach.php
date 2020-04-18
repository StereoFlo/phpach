<?php

namespace Phpach;

use Phpach\Boards\Category;
use Phpach\Thread\Post;
use Phpach\Thread\Thread;
use Phpach\Threads\Board;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use function sprintf;

class Phpach
{
    public const URL_ALL_BOARDS       = 'https://2ch.hk/makaba/mobile.fcgi?task=get_boards';
    public const URL_ALL_POST         = 'https://2ch.hk/makaba/mobile.fcgi?task=get_post&board=%s&post=%d';
    public const URL_THREADS_IN_BOARD = 'https://2ch.hk/%s/threads.json';
    public const URL_THREAD_VIEW      = 'https://2ch.hk/%s/res/%d.json';

    /**
     * @var HttpClient
     */
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    /**
     * @return Category[]
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getAllBoards(): array
    {
        $response = $this->httpClient->request(Request::METHOD_GET, self::URL_ALL_BOARDS)->toArray();
        $res = [];
        foreach ($response as $name => $threads) {
            $res[] = new Category($name, $threads);
        }

        return $res;
    }

    /**
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getAllThreadsInBoard(string $boardId): Board
    {
        $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_THREADS_IN_BOARD, $boardId))->toArray();

        return new Board($response['board'], $response['threads']);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getThread(string $boardId, int $threadId): Thread
    {
        $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_THREAD_VIEW, $boardId, $threadId))->toArray();

        return new Thread($response);
    }

    public function getPost(string $boardId, int $postId): Post
    {
        $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_ALL_POST, $boardId, $postId))->toArray();

        return new Post($response);
    }
}

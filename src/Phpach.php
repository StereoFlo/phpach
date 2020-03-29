<?php

namespace Phpach;

use Phpach\Boards\Category;
use Phpach\Thread\Thread;
use Phpach\Threards\Board;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use function sprintf;

class Phpach
{
    public const URL_ALL_BOARDS = 'https://2ch.hk/makaba/mobile.fcgi?task=get_boards';
    public const URL_THREADS_IN_BOARD = 'https://2ch.hk/%s/threads.json';
    public const URL_THREAD_VIEW = 'https://2ch.hk/%s/res/%d.json';

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
        $response = $this->httpClient->request('GET', self::URL_ALL_BOARDS)->toArray();
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
        $response = $this->httpClient->request('GET', sprintf(self::URL_THREADS_IN_BOARD, $boardId))->toArray();
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
        $response = $this->httpClient->request('GET', sprintf(self::URL_THREAD_VIEW, $boardId, $threadId))->toArray();
        return new Thread($response['title'], $response['posts_count'], $response['unique_posters'], $response['threads']);
    }
}

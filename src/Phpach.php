<?php

declare(strict_types = 1);

namespace Phpach;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use League\Container\Exception\NotFoundException;
use Phpach\Boards\Category;
use Phpach\Thread\Post;
use Phpach\Thread\Thread;
use Phpach\Threads\Board;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use function json_decode;
use function sprintf;
use function str_replace;

class Phpach
{
    public const URL_MAIN             = 'https://2ch.hk';
    public const URL_ALL_BOARDS       = self::URL_MAIN . '/makaba/mobile.fcgi?task=get_boards';
    public const URL_ALL_POST         = self::URL_MAIN . '/makaba/mobile.fcgi?task=get_post&board=%s&post=%d';
    public const URL_THREADS_IN_BOARD = self::URL_MAIN . '/%s/threads.json';
    public const URL_THREAD_VIEW      = self::URL_MAIN . '/%s/res/%d.%s';

    public const FORMAT_JSON = 'json';
    public const FORMAT_HTML = 'html';

    /**
     * @var Client
     */
    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @return Category[]
     */
    public function getAllBoards(): array
    {
        $response = $this->httpClient->request(Request::METHOD_GET, self::URL_ALL_BOARDS);
        $res      = [];
        foreach ($this->getArrayFromBody($response) as $name => $threads) {
            $res[] = new Category($name, $threads);
        }

        return $res;
    }

    public function getAllThreadsInBoard(string $boardId): Board
    {
        $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_THREADS_IN_BOARD, $boardId));
        $response = $this->getArrayFromBody($response);

        return new Board($response['board'], $response['threads']);
    }

    public function getThread(string $boardId, int $threadId): Thread
    {
        try {
            $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_THREAD_VIEW, $boardId, $threadId, self::FORMAT_JSON));
        } catch (ClientException $exception) {
            if (Response::HTTP_NOT_FOUND !== $exception->getCode()) {
                throw $exception;
            }

            $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_THREAD_VIEW, $boardId, $threadId, self::FORMAT_HTML), [
                'allow_redirects' => false,
            ]);

            if (Response::HTTP_MOVED_PERMANENTLY !== $response->getStatusCode()) {
                throw $exception;
            }

            $headers = $response->getHeaders();
            if (!isset($headers['Location'][0])) {
                throw new NotFoundException('location is not specified');
            }

            try {
                $response = $this->httpClient->request(Request::METHOD_GET, $headers['Location'][0], [
                    'allow_redirects' => false,
                ]);

                if (Response::HTTP_FOUND === $response->getStatusCode()) {
                    $headers = $response->getHeaders();
                    if (!isset($headers['Location'][0])) {
                        throw new NotFoundException('location is not specified');
                    }
                    $loc      = self::URL_MAIN . str_replace('.html', '.json', $headers['Location'][0]);
                    $response = $this->httpClient->request(Request::METHOD_GET, $loc);
                }
            } catch (ClientException $exception) {
                throw $exception;
            }
        }

        return new Thread($this->getArrayFromBody($response));
    }

    public function getPost(string $boardId, int $postId): Post
    {
        $response = $this->httpClient->request(Request::METHOD_GET, sprintf(self::URL_ALL_POST, $boardId, $postId));

        return new Post($this->getArrayFromBody($response));
    }

    /**
     * @return array<string, mixed>
     */
    private function getArrayFromBody(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}

<?php

namespace App\Services\Parsers;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

abstract class Grabber
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->getBaseUri(),
        ]);

        $this->directory();
    }

    protected function directory(): string
    {
        $path = base_path(
            implode(DIRECTORY_SEPARATOR, ['parser', $this->getPath()])
        );

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        return $path;
    }

    protected function getHtml(string $url): string
    {
        $html = $this->client->get($url);
        $html = $html->getBody()->getContents();

        return $html;
    }

    protected function crawler(string $path, callable $callback)
    {
        $html = $this->getHtml($path);
        $crawler = new Crawler($html);

        return $callback($crawler);
    }

    /**
     * Base URI for HTTP Client
     * 
     * @return string
     */
    abstract public function getBaseUri(): string;

    /**
     * Path of parser
     * 
     * @return string
     */
    abstract public function getPath(): string;
}

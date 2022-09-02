<?php

namespace App\Services\Parsers\Media;

use App\Services\Parsers\Grabber;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class Parser extends Grabber
{
    /** @var \App\Services\Parsers\Media\Json */
    private $json;

    protected const PAGE = '?PAGEN_1=%s';

    public function __construct()
    {
        parent::__construct();

        $this->json = new Json($this->directory());
    }

    public function getBaseUri(): string {
        return 'https://buybrand.ru';
    }

    public function getPath(): string {
        return 'media';
    }

    public function getMethod(string $module): string
    {
        $method = (string) Str::of(implode(' ', ['get', $module, 'module']))->camel();

        if (!method_exists(self::class, $method)) {
            throw new \Exception("Method $method() not exists");
        }

        return $method;
    }

    public function getNewsModule(?int $count = null, ?int $pages = null): array
    {
        $url = '/news/';
        $links = $this->links($url, $pages, fn (Crawler $crawler) => $crawler->filter('.b-catalog-section .js-load-more-item')->each(fn (Crawler $node, $i) => $node->filter('.img-wrap > a')->attr('href')));
        $materials = [];

        foreach ($links as $index => $link) {
            if (!is_null($count) && $index >= $count) break;

            $json = $this->json->file($url . md5($link));

            if (!$json->exists()) {
                $material = $this->crawler($link, fn (Crawler $crawler) => [
                    'title'      => $crawler->filter('.single-title')->text(),
                    'subtitle'   => $crawler->filter('.single-content .big')->count() ? $crawler->filter('.single-content .big')->text() : null,
                    'content'    => implode('', $crawler->filter('.single-content .row > div')->eq(1)->filter('p')->each(fn (Crawler $node, $i) => $node->outerHtml())),
                    'views'      => (int) $crawler->filter('.single-card-meta .views')->text(),
                    'tags'       => $crawler->filter('.single-card-meta > .tags a')->each(fn (Crawler $node, $i) => Str::ucfirst($node->text())),
                    'image'      => $crawler->filter('.single-content .row > div img')->eq(0)->count() ? $crawler->filter('.single-content .row > div img')->eq(0)->attr('src') : null,
                    'created_at' => $crawler->filter('.single-card-meta .card-date')->text(),
                ]);

                $json->save($material);
            } else {
                $material = $json->get();
            }

            $materials[] = $material;
        }

        return $materials;
    }

    public function getVideoModule(?int $count = null, ?int $pages = null): array
    {
        $url = '/video/';
        $links = $this->links($url, $pages, fn (Crawler $crawler) => $crawler->filter('.b-catalog-section .js-load-more-container .item')->each(fn (Crawler $node, $i) => $node->filter('.item-title')->attr('href')));
        $materials = [];

        foreach ($links as $index => $link) {
            if (!is_null($count) && $index >= $count) break;

            $json = $this->json->file($url . md5($link));

            if (!$json->exists()) {
                $material = $this->crawler($link, function (Crawler $crawler) {
                    $node = $crawler->filter('.single-content .row')->eq(0);

                    return [
                        'title'      => $crawler->filter('.single-title')->text(),
                        'subtitle'   => $node->filter('.big')->count() ? $crawler->filter('.big')->text() : null,
                        'content'    => $node->children('div')->eq(2)->html(),
                        'image'      => $node->filter('.img-wrap img')->count() ? $crawler->filter('.img-wrap img')->attr('src') : null,
                        'youtube'    => $node->filter('.video-popup')->attr('href'),
                        'tags'       => $crawler->filter('.single-card-meta > .tags a')->each(fn (Crawler $node, $i) => Str::ucfirst($node->text())),
                        'created_at' => $crawler->filter('.single-card-meta .card-date')->text() ?? null,
                    ];
                });

                $json->save($material);
            } else {
                $material = $json->get();
            }

            $materials[] = $material;
        }

        return $materials;
    }

    /**
     * Get materials URL
     * 
     * @param  string $url
     * @param  null|int $max_page
     * @param  callable $callback
     * @return array
     */
    private function links(string $url, ?int $max_page = null, callable $callback): array
    {
        $links = [];
        $count = is_null($max_page) ? $this->pages($url) : $max_page;

        for ($i = 1; $i <= $count; $i++) { 
            $path = $url . sprintf(self::PAGE, $i);

            $links[] = $this->crawler($path, $callback);
        }

        return collect($links)->flatten()->reverse()->values()->toArray();
    }

    /**
     * Get pages count
     * 
     * @param  string $html
     * @return int
     */
    private function pages(string $path): int
    {
        $pagination = $this->crawler($path, fn (Crawler $crawler) => $crawler->filter('.pagination li'));

        return (int) $pagination->eq($pagination->count() - 2)->text();
    }
}

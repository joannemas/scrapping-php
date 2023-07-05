<?php

namespace Joanne\ScrappingPhp;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class Api
{
    /**
     * @return array<int, array<string, string|null>>
     */
    public function scrapRequest(): array
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://www.planete-sonic.com/univers/personnages/personnages-des-jeux/'
        );
        $content = $response->getContent();

        $html = $content;

        $crawler = new Crawler($html);
        $results = [];

        $crawler->filter('a.large-6')->each(function (Crawler $node) use (&$results) {
            $h3 = $node->filter('h3')->text();
            $image = $node->filter('img')->attr('src');
            $descriptionNode = $node->filter('p')->eq(1);
            $description = $descriptionNode->count() > 0 ? $descriptionNode->text() : null;

            $result = [
                'title' => $h3,
                'image' => $image,
                'description' => $description
            ];

            $results[] = $result;
        });

        return $results;
    }
}
<?php

namespace Joanne\ScrappingPhp;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class Api
{
    public function scrapRequest() : array
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
            $description = $node->filter('p')->eq(1)->text();

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
?>
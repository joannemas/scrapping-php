<?php

use Joanne\ScrappingPhp\Api;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testScrapRequest()
    {
        $api = new Api();
        $results = $api->scrapRequest();

        $this->assertIsArray($results);

        foreach ($results as $result) {
            $this->assertIsArray($result);
            $this->assertArrayHasKey('title', $result);
            $this->assertArrayHasKey('image', $result);
            $this->assertArrayHasKey('description', $result);
        }
    }
}


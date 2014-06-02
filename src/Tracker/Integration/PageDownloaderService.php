<?php


namespace Tracker\Integration;

class PageDownloaderService {

    public static function main()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://www.eltenedor.es/restaurante/miramar-restaurant-garden-club/2418');
        var_dump($response);
    }
} 
<?php


namespace Tracker\Domain;

use GuzzleHttp\Client;
use Tracker\Infrastructure\Persistence\FilePageRepository;

class PageService {

    private $httpClient;
    private $pageRepository;

    public function __construct()
    {
        $this->httpClient = new Client();
        $this->pageRepository = new FilePageRepository();
    }

    public function savePageContent($url)
    {
        $page = new Page();
        $page->setUrl($url);
        $response = $this->httpClient->get($url);
        if ($response->getStatusCode() == '200') {
            $page->setContent($response->getBody());
            $this->pageRepository->persist($page);
        }
    }
} 
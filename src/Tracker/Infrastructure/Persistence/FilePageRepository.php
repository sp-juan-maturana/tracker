<?php

namespace Tracker\Infrastructure\Persistence;


use Tracker\Domain\PageRepository;

class FilePageRepository implements PageRepository {

    private $rootDataPath;

    public function __construct()
    {
        $this->rootDataPath = './data';
    }

    /**
     * @param $page \Tracker\Domain\Page
     */
    public function persist($page)
    {
        $urlParts = parse_url($page->getUrl());
        $directoryPath = $this->createDirectoryIfNotExists($urlParts['host']);
        $fileName = $this->generateFileName($urlParts['path']);
        file_put_contents($directoryPath.'/'.$fileName, $page->getContent());
    }

    private function generateFileName($pagePath)
    {
       return str_replace('/', '_', $pagePath);
    }

    /**
     * @param $pageHost
     * @return string
     */
    public function createDirectoryIfNotExists($pageHost)
    {
        $directoryPath = $this->rootDataPath . '/' . $pageHost;
        if (!is_dir($directoryPath)) {
            mkdir($directoryPath);
            return $directoryPath;
        }
        return $directoryPath;
    }
}
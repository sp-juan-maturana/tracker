<?php
namespace Tracker\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tracker\Domain\PageService;

class DownloadPage extends Command
{
    protected function configure()
    {
        $this
            ->setName('downloadPage')
            ->setDescription('Download a page')
            ->addArgument(
                'url',
                InputArgument::REQUIRED ,
                'URL to download'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $pageService = new PageService();
        $pageService->savePageContent($url);
        $output->writeln('OK');
    }
}
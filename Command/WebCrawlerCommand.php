<?php
/*
 * This file is part of the Sulu CMF.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\WebCrawlerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Enable console to start webcrawler
 */
class WebCrawlerCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('sulu:webcrawler:run')
            ->addArgument('url', InputArgument::REQUIRED, 'Root URL to start crawl process')
            ->addArgument('depth', InputArgument::OPTIONAL, 'Maximum depth of crawl', 3)
            ->setDescription('Crawls given url and display results');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $crawler = $this->getContainer()->get('sulu_web_crawler');
        $result = $crawler->run($input->getArgument('url'), intval($input->getArgument('depth')));

        $table = new Table($output);
        $table->setHeaders(array('Status Code', 'Title', 'URL', 'External', 'Visited', 'Referrer', 'Frequency'));

        foreach ($result as $url => $item) {
            $table->addRow(
                array(
                    isset($item['status_code']) ? $item['status_code'] : '???',
                    isset($item['title']) ? mb_strimwidth($item['title'], 0, 34, ' ...') : '???',
                    mb_strimwidth($url, 0, 54, ' ...'),
                    !isset($item['external_link']) ? '???' : $item['external_link'] ? 'yes' : 'no',
                    !isset($item['visited']) ? '???' : $item['visited'] ? 'yes' : 'no',
                    isset($item['referrer']) ? join(',', $item['referrer']) : '???',
                    isset($item['frequency']) ? $item['frequency'] : '???',
                )
            );
        }

        $table->render();
    }
}

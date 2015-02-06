<?php
/*
 * This file is part of the Sulu CMF.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\WebCrawlerBundle\WebCrawler;

/**
 * Wraps the webcrawler from codeguy/arachnid
 */
class WebCrawler implements WebCrawlerInterface
{
    /**
     * @var CrawlerFactoryInterface
     */
    private $crawlerFactory;

    function __construct(CrawlerFactoryInterface $crawlerFactory)
    {
        $this->crawlerFactory = $crawlerFactory;
    }

    /**
     * Returns a fresh crawler instance with given url and depth
     * @param string $url
     * @param int $depth
     * @return \Arachnid\Crawler
     */
    protected function create($url, $depth = 3)
    {
        return $this->crawlerFactory->create($url, $depth);
    }

    /**
     * {@inheritdoc}
     */
    public function run($url, $depth = 3)
    {
        $crawler = $this->create($url, $depth);
        $crawler->traverse();

        return $crawler->getLinks();
    }
}

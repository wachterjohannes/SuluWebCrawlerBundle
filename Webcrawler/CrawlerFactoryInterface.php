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

use Arachnid\Crawler;

/**
 * Interface for a crawler factory
 */
interface CrawlerFactoryInterface
{
    /**
     * Create an instance of a Crawler
     * @param string $url
     * @param integer $depth
     * @return Crawler
     */
    public function create($url, $depth = 3);
}

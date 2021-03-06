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
 * Interface for web crawler
 */
interface WebCrawlerInterface
{

    /**
     * Run a crawling process and returns the result
     * @param $url
     * @param int $depth
     * @return array
     */
    public function run($url, $depth = 3);
}

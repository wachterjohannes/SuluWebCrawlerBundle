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
 * Creates crawler
 */
class CrawlerFactory implements CrawlerFactoryInterface
{
    /**
     * Classname of crawler
     * @var string
     */
    private $className;

    function __construct($className = "Arachnid\\Crawler")
    {
        $this->className = $className;
    }

    /**
     * {@inheritdoc}
     */
    public function create($url, $depth = 3)
    {
        return new $this->className($url, $depth);
    }
}

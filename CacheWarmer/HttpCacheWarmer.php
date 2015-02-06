<?php
/*
 * This file is part of the Sulu CMF.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sulu\Bundle\WebCrawlerBundle\CacheWarmer;

use Sulu\Bundle\WebCrawlerBundle\WebCrawler\WebCrawlerInterface;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

/**
 * Enables cache warming for http
 */
class HttpCacheWarmer implements CacheWarmerInterface
{
    /**
     * @var WebCrawlerInterface
     */
    private $crawler;

    /**
     * @var array
     */
    private $urls;

    /**
     * @var string
     */
    private $env;

    function __construct(WebCrawlerInterface $crawler, $urls, $env)
    {
        $this->crawler = $crawler;
        $this->urls = $urls;
        $this->env = $env;
    }

    /**
     * {@inheritdoc}
     */
    public function isOptional()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function warmUp($cacheDir)
    {
        if ($this->env !== 'dev') {
            foreach ($this->urls as $url) {
                $this->crawler->run($url['url'], $url['depth']);
            }
        }
    }
}

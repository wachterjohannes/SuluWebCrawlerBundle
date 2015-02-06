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

use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

/**
 * Enables cache warming for http
 */
class HttpCacheWarmer implements CacheWarmerInterface
{
    /**
     * {@inheritdoc}
     */
    public function isOptional()
    {
        // TODO: Implement isOptional() method.
    }

    /**
     * {@inheritdoc}
     */
    public function warmUp($cacheDir)
    {
        // TODO: Implement warmUp() method.
    }
}

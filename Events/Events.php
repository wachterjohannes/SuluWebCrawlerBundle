<?php
/*
 * This file is part of the Sulu CMF.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\WebCrawlerBundle\Events;

/**
 * Events thrown by the SuluWebCrawlerBundle
 */
final class Events
{
    const WEBCRAWLER_FINISHED = 'sulu_web_crawler.finished';

    /**
     * Create no instances
     */
    private function __construct()
    {
    }
}

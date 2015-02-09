<?php
/*
 * This file is part of the Sulu CMF.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Sulu\Bundle\WebCrawlerBundle\EventListener;

use Sulu\Bundle\WebCrawlerBundle\Events\FinishedEvent;
use Sulu\Bundle\WebCrawlerBundle\WebCrawler\WebCrawlerLoggerInterface;

/**
 * Log results of a crawler
 */
class LoggerEventListener
{
    /**
     * @var WebCrawlerLoggerInterface
     */
    private $logger;

    function __construct(WebCrawlerLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Log results
     * @param FinishedEvent $event
     */
    public function onFinished(FinishedEvent $event)
    {
        $this->logger->log($event->getResult());
    }
}

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

use Psr\Log\LoggerInterface;

/**
 * Log result of a crawl process
 */
class WebCrawlerLogger implements WebCrawlerLoggerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function log($crawlResult)
    {
        foreach ($crawlResult as $url => $item) {
            $this->logItem($url, $item);
        }
    }

    /**
     * Log a single crawl item
     * @param string $url
     * @param array $item
     */
    private function logItem($url, $item)
    {
        $statusCode = isset($item['status_code']) ? $item['status_code'] : '???';
        $errorMessage = isset($item['error_message']) ? $item['error_message'] : '???';
        $title = isset($item['title']) ? mb_strimwidth($item['title'], 0, 34, ' ...') : '???';
        $message = sprintf('status: %s, title:"%s", url: "%s"', $statusCode, $title, $url);

        switch ($statusCode) {
            case '200':
            case '301':
                $this->logger->info($message);
                break;
            case '404':
                $this->logger->error($message);
                break;
            case 'error':
                $message = sprintf(
                    'status: %s, title:"%s", error_message: "%s", url: "%s"',
                    $statusCode,
                    $title,
                    $errorMessage,
                    $url
                );
                $this->logger->error($message);
                break;
            default:
                $this->logger->debug(sprintf('not-visited (%s)', $message));
                break;
        }
    }
}

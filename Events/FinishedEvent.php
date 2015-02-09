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

use Symfony\Component\EventDispatcher\Event;

/**
 * Event args for finished event
 */
class FinishedEvent extends Event
{
    /**
     * Result of webcrawler
     * @var array
     */
    private $result;

    /**
     * @var string
     */
    private $url;

    /**
     * @var int
     */
    private $maxDepth;

    function __construct($result, $url, $maxDepth)
    {
        $this->result = $result;
        $this->url = $url;
        $this->maxDepth = $maxDepth;
    }

    /**
     * Returns result of a crawler event
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getMaxDepth()
    {
        return $this->maxDepth;
    }
}

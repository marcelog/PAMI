<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Event;

/**
 * Event triggered for a QueueSummary action.
 */
class QueueSummaryEvent extends EventMessage
{
    /**
     * Returns key: 'Queue'.
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->getKey('Queue');
    }

    /**
     * Returns key: 'LoggedIn'.
     *
     * @return string
     */
    public function getLoggedIn()
    {
        return $this->getKey('LoggedIn');
    }

    /**
     * Returns key: 'Available'.
     *
     * @return string
     */
    public function getAvailable()
    {
        return $this->getKey('Available');
    }

    /**
     * Returns key: 'Callers'.
     *
     * @return string
     */
    public function getCallers()
    {
        return $this->getKey('Callers');
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return integer
     */
    public function getHoldTime()
    {
        return $this->getKey('HoldTime');
    }

    /**
     * Returns key: 'LongestHoldTime'.
     *
     * @return integer
     */
    public function getLongestHoldTime()
    {
        return $this->getKey('LongestHoldTime');
    }
}

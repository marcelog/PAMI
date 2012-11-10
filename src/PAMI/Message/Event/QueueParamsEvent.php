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
 * Event triggered for a QueueStatus action.
 */
class QueueParamsEvent extends EventMessage
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
     * Returns key: 'Max'.
     *
     * @return integer
     */
    public function getMax()
    {
        return intval($this->getKey('Max'));
    }

    /**
     * Returns key: 'Strategy'.
     *
     * @return string
     */
    public function getStrategy()
    {
        return $this->getKey('Strategy');
    }

    /**
     * Returns key: 'Calls'.
     *
     * @return integer
     */
    public function getCalls()
    {
        return intval($this->getKey('Calls'));
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return integer
     */
    public function getHoldTime()
    {
        return intval($this->getKey('HoldTime'));
    }

    /**
     * Returns key: 'Completed'.
     *
     * @return integer
     */
    public function getCompleted()
    {
        return intval($this->getKey('Completed'));
    }

    /**
     * Returns key: 'Abandoned'.
     *
     * @return integer
     */
    public function getAbandoned()
    {
        return intval($this->getKey('Abandoned'));
    }

    /**
     * Returns key: 'ServiceLevel'.
     *
     * @return integer
     */
    public function getServiceLevel()
    {
        return intval($this->getKey('ServiceLevel'));
    }

    /**
     * Returns key: 'ServiceLevelPerf'.
     *
     * @return float
     */
    public function getServiceLevelPerf()
    {
        return $this->getKey('ServiceLevelPerf');
    }

    /**
     * Returns key: 'Weight'.
     *
     * @return integer
     */
    public function getWeight()
    {
        return intval($this->getKey('Weight'));
    }
}

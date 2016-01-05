<?php
/**
 * Event triggered for a QueueStatus action.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered for a QueueStatus action.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
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
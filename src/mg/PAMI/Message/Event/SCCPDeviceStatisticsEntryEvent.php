<?php
/**
 * Event triggered when an agent logs in.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2015 Diederik de Groot <ddegroot@users.sf.net>, Marcelo Gornstein <marcelog@gmail.com>
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
 * Event triggered when an agent logs in.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Diederik de Groot <ddegroot@users.sf.net>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class SCCPDeviceStatisticsEntryEvent extends EventMessage
{
    /**
     * Returns key: 'ChannelType'.
     *
     * @return string
     */
    public function getChannelType()
    {
        return $this->getKey('ChannelType');
    }

    /**
     * Returns key: 'ChannelObjectType'.
     *
     * @return string
     */
    public function getChannelObjectType()
    {
        return $this->getKey('ChannelObjectType');
    }

    /**
     * Returns key: 'Type'.
     *
     * @return string
     */
    public function getType()
    {
        return $this->getKey('Type');
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
     * Returns key: 'Packets Sent'.
     *
     * @return integer
     */
    public function getPacketsSent()
    {
        return intval($this->getKey('PcktSnt'));
    }

    /**
     * Returns key: 'Packets Received'.
     *
     * @return integer
     */
    public function getPacketsReceived()
    {
        return intval($this->getKey('PcktRcvd'));
    }

    /**
     * Returns key: 'Packets Lost'.
     *
     * @return integer
     */
    public function getPacketsLost()
    {
        return intval($this->getKey('Lost'));
    }

    /**
     * Returns key: 'Jitter'.
     *
     * @return integer
     */
    public function getJitter()
    {
        return intval($this->getKey('Jitter'));
    }

    /**
     * Returns key: 'Latency'.
     *
     * @return integer
     */
    public function getLatency()
    {
        return intval($this->getKey('Latency'));
    }

    /**
     * Returns key: 'Quality'.
     *
     * @return float
     */
    public function getQuality()
    {
        return floatval($this->getKey('Quality'));
    }

    /**
     * Returns key: 'Average Quality'.
     *
     * @return float
     */
    public function getAverageQuality()
    {
        return floatval($this->getKey('avgQual'));
    }

    /**
     * Returns key: 'Mean Quality'.
     *
     * @return float
     */
    public function getMeanQuality()
    {
        return floatval($this->getKey('meanQual'));
    }

    /**
     * Returns key: 'Maximum Quality'.
     *
     * @return float
     */
    public function getMaxQuality()
    {
        return floatval($this->getKey('maxQual'));
    }

    /**
     * Returns key: 'ReceivedConcealed'.
     *
     * @return float
     */
    public function getReceivedConcealed()
    {
        return floatval($this->getKey('rConceal'));
    }

    /**
     * Returns key: 'sConceal'.
     *
     * @return integer
     */
    public function getSentConcealed()
    {
        return intval($this->getKey('sConceal'));
    }
}

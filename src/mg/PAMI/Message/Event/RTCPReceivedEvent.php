<?php
/**
 * Event triggered when exchanging rtp stats.
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
 * Event triggered when exchanging rtp stats.
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
class RTCPReceivedEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    /**
     * Returns key: 'From'.
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->getKey('From');
    }

    /**
     * Returns key: 'PT'.
     *
     * @return string
     */
    public function getPT()
    {
        return $this->getKey('PT');
    }

    /**
     * Returns key: 'ReceptionReports'.
     *
     * @return string
     */
    public function getReceptionReports()
    {
        return $this->getKey('ReceptionReports');
    }

    /**
     * Returns key: 'SenderSSRC'.
     *
     * @return string
     */
    public function getSenderSSRC()
    {
        return $this->getKey('SenderSSRC');
    }

    /**
     * Returns key: 'FractionLost'.
     *
     * @return string
     */
    public function getFractionLost()
    {
        return $this->getKey('FractionLost');
    }

    /**
     * Returns key: 'PacketsLost'.
     *
     * @return string
     */
    public function getPacketsLost()
    {
        return $this->getKey('PacketsLost');
    }

    /**
     * Returns key: 'HighestSequence'.
     *
     * @return string
     */
    public function getHighestSequence()
    {
        return $this->getKey('HighestSequence');
    }
    /**
     * Returns key: 'SequenceNumberCycles'.
     *
     * @return string
     */
    public function getSequenceNumberCycles()
    {
        return $this->getKey('SequenceNumberCycles');
    }
    /**
     * Returns key: 'IAJitter'.
     *
     * @return string
     */
    public function getIAJitter()
    {
        return $this->getKey('IAJitter');
    }
    /**
     * Returns key: 'LastSR'.
     *
     * @return string
     */
    public function getLastSR()
    {
        return $this->getKey('LastSR');
    }
    /**
     * Returns key: 'DLSR'.
     *
     * @return string
     */
    public function getDLSR()
    {
        return $this->getKey('DLSR');
    }
    /**
     * Returns key: 'RTT'.
     *
     * @return string
     */
    public function getRTT()
    {
        return $this->getKey('RTT');
    }
}
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
class RTPReceiverStatEvent extends EventMessage
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
     * Returns key: 'SSRC'.
     *
     * @return string
     */
    public function getSSRC()
    {
        return $this->getKey('SSRC');
    }

    /**
     * Returns key: 'ReceivedPackets'.
     *
     * @return string
     */
    public function getReceivedPackets()
    {
        return $this->getKey('ReceivedPackets');
    }

    /**
     * Returns key: 'LostPackets'.
     *
     * @return string
     */
    public function getLostPackets()
    {
        return $this->getKey('LostPackets');
    }

    /**
     * Returns key: 'Jitter'.
     *
     * @return string
     */
    public function getJitter()
    {
        return $this->getKey('Jitter');
    }

    /**
     * Returns key: 'Transit'.
     *
     * @return string
     */
    public function getTransit()
    {
        return $this->getKey('Transit');
    }

    /**
     * Returns key: 'RRCount'.
     *
     * @return string
     */
    public function getRRCount()
    {
        return $this->getKey('RRCount');
    }
}
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
class SCCPChannelEntryEvent extends EventMessage
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
     * Returns key: 'ID'.
     *
     * @return integer
     */
    public function getID()
    {
        return intval($this->getKey('ID'));
    }

    /**
     * Returns key: 'Name'.
     *
     * @return string
     */
    public function getName()
    {
        return $this->getKey('Name');
    }

    /**
     * Returns key: 'LineName'.
     *
     * @return string
     */
    public function getLineName()
    {
        return $this->getKey('LineName');
    }

    /**
     * Returns key: 'DeviceName'.
     *
     * @return string
     */
    public function getDeviceName()
    {
        return $this->getKey('DeviceName');
    }

    /**
     * Returns key: 'NumCalled'.
     *
     * @return string
     */
    public function getNumCalled()
    {
        return $this->getKey('NumCalled');
    }

    /**
     * Returns key: 'PBX State'.
     *
     * @return string
     */
    public function getPBXState()
    {
        return $this->getKey('PBXState');
    }

    /**
     * Returns key: 'SCCP State'.
     *
     * @return string
     */
    public function getSCCPState()
    {
        return $this->getKey('SCCPState');
    }

    /**
     * Returns key: 'ReadCodec'.
     *
     * @return string
     */
    public function getReadCodec()
    {
        return $this->getKey('ReadCodec');
    }

    /**
     * Returns key: 'WriteCodec'.
     *
     * @return string
     */
    public function getWriteCodec()
    {
        return $this->getKey('WriteCodec');
    }

    /**
     * Returns key: 'RTPPeer'.
     *
     * @return string
     */
    public function getRTPPeer()
    {
        return $this->getKey('RTPPeer');
    }

    /**
     * Returns key: 'Direct Media (Direct RTP)'.
     *
     * @return boolean
     */
    public function getDirectMedia()
    {
        return $this->getBoolKey('Direct');
    }

    /**
     * Returns key: 'DTMFmode'.
     *
     * @return string
     */
    public function getDTMFmode()
    {
        return $this->getKey('DTMFmode');
    }

}

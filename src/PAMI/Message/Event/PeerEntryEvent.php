<?php
/**
 * Event triggered for each peer when an action Sippeers is issued.
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
 * Event triggered for each peer when an action Sippeers is issued.
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
class PeerEntryEvent extends EventMessage
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
     * Returns key: 'ObjectName'.
     *
     * @return string
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Returns key: 'ChanObjectType'.
     *
     * @return string
     */
    public function getChannelObjectType()
    {
        return $this->getKey('ChanObjectType');
    }

    /**
     * Returns key: 'IPAddress'.
     *
     * @return string
     */
    public function getIPAddress()
    {
        return $this->getKey('IPAddress');
    }

    /**
     * Returns key: 'IPPort'.
     *
     * @return string
     */
    public function getIPPort()
    {
        return $this->getKey('IPPort');
    }

    /**
     * Returns key: 'Dynamic'.
     *
     * @return string
     */
    public function getDynamic()
    {
        return $this->getKey('Dynamic');
    }

    /**
     * Returns key: 'NatSupport'.
     *
     * @return string
     */
    public function getNatSupport()
    {
        return $this->getKey('NatSupport');
    }

    /**
     * Returns key: 'VideoSupport'.
     *
     * @return string
     */
    public function getVideoSupport()
    {
        return $this->getKey('VideoSupport');
    }

    /**
     * Returns key: 'TextSupport'.
     *
     * @return string
     */
    public function getTextSupport()
    {
        return $this->getKey('TextSupport');
    }

    /**
     * Returns key: 'ACL'.
     *
     * @return string
     */
    public function getACL()
    {
        return $this->getKey('ACL');
    }

    /**
     * Returns key: 'Status'.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'RealtimeDevice'.
     *
     * @return string
     */
    public function getRealtimeDevice()
    {
        return $this->getKey('RealtimeDevice');
    }
}
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
class SCCPLineEntryEvent extends EventMessage
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
     * Returns key: 'Exten'.
     *
     * @return string
     */
    public function getExten()
    {
        return $this->getKey('Exten');
    }

    /**
     * Returns key: 'SubscriptionNumber'.
     *
     * @return string
     */
    public function getSubscriptionNumber()
    {
        return $this->getKey('SubscriptionNumber');
    }

    /**
     * Returns key: 'Label'.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->getKey('Label');
    }

    /**
     * Returns key: 'Device'.
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->getKey('Device');
    }

    /**
     * Returns key: 'MWI'.
     *
     * @return string
     */
    public function getMWI()
    {
        return $this->getKey('MWI');
    }

    /**
     * Returns key: 'ActiveChannels'.
     *
     * @return string
     */
    public function getActiveChannels()
    {
        return $this->getKey('ActiveChannels');
    }

    /**
     * Returns key: 'ChannelState'.
     *
     * @return string
     */
    public function getChannelState()
    {
        return $this->getKey('ChannelState');
    }

    /**
     * Returns key: 'CallType'.
     *
     * @return string
     */
    public function getCallType()
    {
        return $this->getKey('CallType');
    }

    /**
     * Returns key: 'PartyName'.
     *
     * @return string
     */
    public function getPartyName()
    {
        return $this->getKey('PartyName');
    }

    /**
     * Returns key: 'Capabilities'.
     *
     * @return string
     */
    public function getCapabilities()
    {
        return $this->getKey('Capabilities');
    }

}

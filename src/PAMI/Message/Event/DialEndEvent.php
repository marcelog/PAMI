<?php
/**
 * Event triggered when a dial action has completed.
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

/**
 * Event triggered when a dial action has completed.
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
class DialEndEvent extends EventMessage
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
     * Returns key: 'Channel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
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
     * Returns key: 'ChannelStateDesc'.
     *
     * @return string
     */
    public function getChannelStateDesc()
    {
        return $this->getKey('ChannelStateDesc');
    }

    /**
     * Returns key: 'CallerIDNum'.
     *
     * @return string
     */
    public function getCallerIDNum()
    {
        return $this->getKey('CallerIDNum');
    }

    /**
     * Returns key: 'CallerIDName'.
     *
     * @return string
     */
    public function getCallerIDName()
    {
        return $this->getKey('CallerIDName');
    }

    /**
     * Returns key: 'ConnectedLineNum'.
     *
     * @return string
     */
    public function getConnectedLineNum()
    {
        return $this->getKey('ConnectedLineNum');
    }

    /**
     * Returns key: 'ConnectedLineName'.
     *
     * @return string
     */
    public function getConnectedLineName()
    {
        return $this->getKey('ConnectedLineName');
    }

    /**
     * Returns key: 'AccountCode'.
     *
     * @return string
     */
    public function getAccountCode()
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
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
     * Returns key: 'Priority'.
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->getKey('Priority');
    }

    /**
     * Returns key: 'Uniqueid'.
     *
     * @return string
     */
    public function getUniqueid()
    {
        return $this->getKey('Uniqueid');
    }

    /**
     * Returns key: 'DestChannel'.
     *
     * @return string
     */
    public function getDestChannel()
    {
        return $this->getKey('DestChannel');
    }

    /**
     * Returns key: 'DestChannelState'.
     *
     * @return string
     */
    public function getDestChannelState()
    {
        return $this->getKey('DestChannelState');
    }

    /**
     * Returns key: 'DestChannelStateDesc'.
     *
     * @return string
     */
    public function getDestChannelStateDesc()
    {
        return $this->getKey('DestChannelStateDesc');
    }

    /**
     * Returns key: 'DestCallerIDNum'.
     *
     * @return string
     */
    public function getDestCallerIDNum()
    {
        return $this->getKey('DestCallerIDNum');
    }

    /**
     * Returns key: 'DestCallerIDName'.
     *
     * @return string
     */
    public function getDestCallerIDName()
    {
        return $this->getKey('DestCallerIDName');
    }

    /**
     * Returns key: 'DestConnectedLineNum'.
     *
     * @return string
     */
    public function getDestConnectedLineNum()
    {
        return $this->getKey('DestConnectedLineNum');
    }

    /**
     * Returns key: 'DestConnectedLineName'.
     *
     * @return string
     */
    public function getDestConnectedLineName()
    {
        return $this->getKey('DestConnectedLineName');
    }

    /**
     * Returns key: 'DestAccountCode'.
     *
     * @return string
     */
    public function getDestAccountCode()
    {
        return $this->getKey('DestAccountCode');
    }

    /**
     * Returns key: 'DestContext'.
     *
     * @return string
     */
    public function getDestContext()
    {
        return $this->getKey('DestContext');
    }

    /**
     * Returns key: 'DestExten'.
     *
     * @return string
     */
    public function getDestExten()
    {
        return $this->getKey('DestExten');
    }

    /**
     * Returns key: 'DestPriority'.
     *
     * @return string
     */
    public function getDestPriority()
    {
        return $this->getKey('DestPriority');
    }

    /**
     * Returns key: 'DestUniqueid'.
     *
     * @return string
     */
    public function getDestUniqueid()
    {
        return $this->getKey('DestUniqueid');
    }

    /**
     * Returns key: 'DialStatus'.
     *
     * @return string
     */
    public function getDialStatus()
    {
        return $this->getKey('DialStatus');
    }
}

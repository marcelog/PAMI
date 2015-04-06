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
class SCCPDeviceEntryEvent extends EventMessage
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
     * Returns key: 'Name'.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->getKey('Descr');
    }

    /**
     * Returns key: 'Address'.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->getKey('Address');
    }

    /**
     * Returns key: 'Mac'.
     *
     * @return string
     */
    public function getMac()
    {
        return $this->getKey('Mac');
    }

    /**
     * Returns key: 'RegState'.
     *
     * @return string
     */
    public function getRegState()
    {
        return $this->getKey('RegState');
    }

    /**
     * Returns key: 'Token'.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->getKey('Token');
    }

    /**
     * Returns key: 'RegistrationTime'.
     *
     * @return string
     */
    public function getRegTime()
    {
        return $this->getKey('RegTime');
    }

    /**
     * Returns key: 'Active'.
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->getBoolKey('Act');
    }

    /**
     * Returns key: 'Lines'.
     *
     * @return int
     */
    public function getLines()
    {
        return intval($this->getKey('Lines'));
    }

    /**
     * Returns key: 'Nat'.
     *
     * @return string
     */
    public function getNat()
    {
        return $this->getKey('Nat');
    }
}

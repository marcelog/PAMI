<?php
/**
 * Event triggered when a dial is executed.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Morvai Szabolcs <morvai88@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Morvai Szabolcs <morvai88@gmail.com>
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
 * Event triggered when a dial is executed.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Morvai Szabolcs <morvai88@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ContactListEvent extends EventMessage
{
    /**
     * Returns key: 'ObjectType'.
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->getKey('ObjectType');
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
     * Returns key: 'ViaAddr'.
     *
     * @return string
     */
    public function getViaAddr()
    {
        return $this->getKey('ViaAddr');
    }

    /**
     * Returns key: 'QualifyTimeout'.
     *
     * @return string
     */
    public function getQualifyTimeout()
    {
        return $this->getKey('QualifyTimeout');
    }

    /**
     * Returns key: 'CallId'.
     *
     * @return string
     */
    public function getCallId()
    {
        return $this->getKey('CallId');
    }

    /**
     * Returns key: 'RegServer'.
     *
     * @return string
     */
    public function getRegServer()
    {
        return $this->getKey('RegServer');
    }

    /**
     * Returns key: 'PruneOnBoot'.
     *
     * @return string
     */
    public function getPruneOnBoot()
    {
        return $this->getKey('PruneOnBoot');
    }

    /**
     * Returns key: 'Path'.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->getKey('Path');
    }

    /**
     * Returns key: 'Endpoint'.
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->getKey('Endpoint');
    }

    /**
     * Returns key: 'ViaPort'.
     *
     * @return string
     */
    public function getViaPort()
    {
        return $this->getKey('ViaPort');
    }

    /**
     * Returns key: 'AuthenticateQualify'.
     *
     * @return string
     */
    public function getAuthenticateQualify()
    {
        return $this->getKey('AuthenticateQualify');
    }

    /**
     * Returns key: 'Uri'.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->getKey('Uri');
    }

    /**
     * Returns key: 'QualifyFrequency'.
     *
     * @return string
     */
    public function getQualifyFrequency()
    {
        return $this->getKey('QualifyFrequency');
    }

    /**
     * Returns key: 'UserAgent'.
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->getKey('UserAgent');
    }

    /**
     * Returns key: 'ExpirationTime'.
     *
     * @return string
     */
    public function getExpirationTime()
    {
        return $this->getKey('ExpirationTime');
    }

    /**
     * Returns key: 'OutboundProxy'.
     *
     * @return string
     */
    public function getOutboundProxy()
    {
        return $this->getKey('OutboundProxy');
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
}

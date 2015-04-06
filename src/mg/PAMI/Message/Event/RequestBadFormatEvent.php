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
class RequestBadFormatEvent extends EventMessage
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
     * Returns key: 'SequenceNumber'.
     *
     * @return int
     */
    public function getSequenceNumber()
    {
        return $this->getKey('SequenceNumber');
    }

    /**
     * Returns key: 'File'.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->getKey('File');
    }

    /**
     * Returns key: 'Line'.
     *
     * @return int
     */
    public function getLine()
    {
        return $this->getKey('Line');
    }

    /**
     * Returns key: 'Func'.
     *
     * @return string
     */
    public function getFunc()
    {
        return $this->getKey('Func');
    }

    /**
     * Returns key: 'EventTV'.
     *
     * @return string
     */
    public function getEventTV()
    {
        return $this->getKey('EventTV');
    }

    /**
     * Returns key: 'Severity'.
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->getKey('Severity');
    }
    
    /**
     * Returns key: 'Service'.
     *
     * @return string
     */
    public function getService()
    {
        return $this->getKey('Service');
    }

    /**
     * Returns key: 'EventVersion'.
     *
     * @return int
     */
    public function getEventVersion()
    {
        return $this->getKey('EventVersion');
    }

    /**
     * Returns key: 'AccountID'.
     *
     * @return string
     */
    public function getAccountID()
    {
        return $this->getKey('AccountID');
    }

    /**
     * Returns key: 'SessionID'.
     *
     * @return string
     */
    public function getSessionID()
    {
        return $this->getKey('SessionID');
    }

    /**
     * Returns key: 'LocalAddress'.
     *
     * @return string
     */
    public function getLocalAddress()
    {
        return $this->getKey('LocalAddress');
    }

    /**
     * Returns key: 'RemoteAddress'.
     *
     * @return string
     */
    public function getRemoteAddress()
    {
        return $this->getKey('RemoteAddress');
    }

    /**
     * Returns key: 'UsingPassword'.
     *
     * @return boolean
     */
    public function getUsingPassword()
    {
        return $this->getBoolKey('UsingPassword');
    }

    /**
     * Returns key: 'SessionTV'.
     *
     * @return string
     */
    public function getSessionTV()
    {
        return $this->getKey('SessionTV');
    }
}

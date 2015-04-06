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
class SCCPDeviceButtonEntryEvent extends EventMessage
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
     * Returns key: 'Id'.
     *
     * @return integer
     */
    public function getId()
    {
        return intval($this->getKey('Id'));
    }

    /**
     * Returns key: 'Inst'.
     *
     * @return integer
     */
    public function getInst()
    {
        return intval($this->getKey('Inst'));
    }

    /**
     * Returns key: 'TypeStr'.
     *
     * @return string
     */
    public function getTypeStr()
    {
        return $this->getKey('TypeStr');
    }

    /**
     * Returns key: 'Type'.
     *
     * @return integer
     */
    public function getType()
    {
        return intval($this->getKey('Type'));
    }

    /**
     * Returns key: 'PendingDelete'.
     *
     * @return boolean
     */
    public function getPendingDelete()
    {
    	return $this->getBoolKey('pendDel');
    }

    /**
     * Returns key: 'PendingUpdate'.
     *
     * @return boolean
     */
    public function getPendingUpdate()
    {
    	return $this->getBoolKey('pendUpdt');
    }

    /**
     * Returns key: 'Default'.
     *
     * @return boolean
     */
    public function getDefault()
    {
    	return $this->getBoolKey('Default');
    }
}

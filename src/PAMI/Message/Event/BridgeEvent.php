<?php
/**
 * Event triggered when bridging (connecting) two channels.
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
 * Event triggered when bridging (connecting) two channels.
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
class BridgeEvent extends EventMessage
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
     * Returns key: 'Bridgestate'.
     *
     * @return string
     */
    public function getBridgeState()
    {
        return $this->getKey('Bridgestate');
    }

    /**
     * Returns key: 'Bridgetype'.
     *
     * @return string
     */
    public function getBridgeType()
    {
        return $this->getKey('Bridgetype');
    }

    /**
     * Returns key: 'Channel1'.
     *
     * @return string
     */
    public function getChannel1()
    {
        return $this->getKey('Channel1');
    }

    /**
     * Returns key: 'Channel2'.
     *
     * @return string
     */
    public function getChannel2()
    {
        return $this->getKey('Channel2');
    }

    /**
     * Returns key: 'CallerID1'.
     *
     * @return string
     */
    public function getCallerID1()
    {
        return $this->getKey('CallerID1');
    }

    /**
     * Returns key: 'CallerID2'.
     *
     * @return string
     */
    public function getCallerID2()
    {
        return $this->getKey('CallerID2');
    }

    /**
     * Returns key: 'UniqueID1'.
     *
     * @return string
     */
    public function getUniqueID1()
    {
        return $this->getKey('UniqueID1');
    }

    /**
     * Returns key: 'UniqueID2'.
     *
     * @return string
     */
    public function getUniqueID2()
    {
        return $this->getKey('UniqueID2');
    }
}
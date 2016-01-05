<?php
/**
 * Event triggered for agents.
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
 * Event triggered for agents.
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
class AgentsEvent extends EventMessage
{
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
     * Returns key: 'Agent'.
     *
     * @return string
     */
    public function getAgent()
    {
        return $this->getKey('Agent');
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
     * Returns key: 'LoggedInChan'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('LoggedInChan');
    }

    /**
     * Returns key: 'LoggedInTime'.
     *
     * @return integer
     */
    public function getLoggedInTime()
    {
        return $this->getKey('LoggedInTime');
    }

    /**
     * Returns key: 'TalkingTo'.
     *
     * @return integer
     */
    public function getTalkingTo()
    {
        return $this->getKey('TalkingTo');
    }

    /**
     * Returns key: 'TalkingToChannel'.
     *
     * @return integer
     */
    public function getTalkingToChannel()
    {
        return $this->getKey('TalkingToChannel');
    }
}
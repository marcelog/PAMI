<?php
/**
 * Event triggered when an action ConfbridgeList is issued.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Matt Styles <mstyleshk@gmail.com>
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
 * Event triggered when an action ConfbridgeList is issued.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Matt Styles <mstyleshk@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ConfbridgeListEvent extends EventMessage
{
    /**
     * Returns key: 'Conference'.
     *
     * @return string
     */
    public function getConference()
    {
        return $this->getKey('Conference');
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
     * Returns key: 'MarkedUser'.
     *
     * @return string
     */
    public function getMarkedUser()
    {
        return $this->getKey('MarkedUser');
    }

    /**
     * Returns key: 'WaitMarked'.
     *
     * @return string
     */
    public function getWaitMarked()
    {
        return $this->getKey('WaitMarked');
    }

    /**
     * Returns key: 'EndMarked'.
     *
     * @return string
     */
    public function getEndMarked()
    {
        return $this->getKey('EndMarked');
    }

    /**
     * Returns key: 'Waiting'.
     *
     * @return string
     */
    public function getWaiting()
    {
        return $this->getKey('Waiting');
    }

    /**
     * Returns key: 'Muted'.
     *
     * @return string
     */
    public function getMuted()
    {
        return $this->getKey('Muted');
    }

    /**
     * Returns key: 'AnsweredTime'.
     *
     * @return string
     */
    public function getAnsweredTime()
    {
        return $this->getKey('AnsweredTime');
    }

    /**
     * Returns key: 'Admin'.
     *
     * @return string
     */
    public function getAdmin()
    {
        return $this->getKey('Admin');
    }
}

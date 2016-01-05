<?php
/**
 * Event triggered when an action DAHDIShowChannel is issued.
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
 * Event triggered when an action DAHDIShowChannel is issued.
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
class DAHDIShowChannelsEvent extends EventMessage
{
    /**
     * Returns key: 'DAHDIChannel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }

    /**
     * Returns key: 'Signalling'.
     *
     * @return string
     */
    public function getSignalling()
    {
        return $this->getKey('Signalling');
    }

    /**
     * Returns key: 'SignallingCode'.
     *
     * @return string
     */
    public function getSignallingCode()
    {
        return $this->getKey('SignallingCode');
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
     * Returns key: 'DND'.
     *
     * @return string
     */
    public function getDND()
    {
        return $this->getKey('DND');
    }

    /**
     * Returns key: 'Alarm'.
     *
     * @return string
     */
    public function getAlarm()
    {
        return $this->getKey('Alarm');
    }
}
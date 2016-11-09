<?php
/**
 * MixMonitorMute action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
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
namespace PAMI\Message\Action;

/**
 * MixMonitorMute action message.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Matt Styles <mstyleshk@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class MixMonitorMuteAction extends ActionMessage
{
    const DIRECTION_READ = 'read';
    const DIRECTION_WRITE = 'write';
    const DIRECTION_BOTH = 'both';

    /**
     * Sets state key.
     *
     * @param bool $state Mute state
     *
     * @return void
     */
    public function setState($state)
    {
        $this->setKey('State', $state ? 1 : 0);
    }

    /**
     * Sets state key.
     *
     * @param string $direction Which part of the recording to mute:
     *                          read, write or both (from channel, to channel or both channels).
     *
     * @return void
     */
    public function setDirection($direction)
    {
        $this->setKey('Direction', $direction);
    }

    /**
     * Constructor.
     *
     * @param string $channel Channel on which to act.
     * @param bool $state Turn mute on or off
     * @param string $direction Which part of the recording to mute:
     *                          read, write or both (from channel, to channel or both channels).
     */
    public function __construct($channel, $state = true, $direction = 'both')
    {
        parent::__construct('MixMonitorMute');
        $this->setKey('Channel', $channel);
        $this->setState($state);
        $this->setDirection($direction);
    }
}

<?php
/**
 * A generic incoming message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://marcelog.github.com/PAMI/
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
namespace PAMI\Message;

/**
 * A generic incoming message.
 *
 * PHP Version 5
 *
 * @category Pami
 * @package  Message
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
abstract class IncomingMessage extends Message
{
    /**
     * Holds original message.
     * @var string
     */
    protected $rawContent;

    /**
     * Metadata. Specific channel variables.
     * @var string[]
     */
    protected $channelVariables;

    /**
     * Serialize function.
     *
     * @return string[]
     */
    public function __sleep()
    {
        $ret = parent::__sleep();
        $ret[] = 'rawContent';
        return $ret;
    }

    /**
     * Returns key 'EventList'. In respones, this will surely be a "start". In
     * events, should be a "complete".
     *
     * @return string
     */
    public function getEventList()
    {
        return $this->getKey('EventList');
    }

    /**
     * Returns the original message content without parsing.
     *
     * @return string
     */
    public function getRawContent()
    {
        return $this->rawContent;
    }

    /**
     * Returns the channel variables for all reported channels.
     * https://github.com/marcelog/PAMI/issues/85
     *
     * The channel names will be lowercased.
     *
     * @return array
     */
    public function getAllChannelVariables()
    {
        return $this->channelVariables;
    }

    /**
     * Returns the channel variables for the given channel.
     * https://github.com/marcelog/PAMI/issues/85
     *
     * @param string $channel Channel name. If not given, will return variables
     * for the "current" channel.
     *
     * @return array
     */
    public function getChannelVariables($channel = null)
    {
        if (is_null($channel)) {
            if (!isset($this->keys['channel'])) {
                return $this->getChannelVariables('default');
            } else {
                return $this->getChannelVariables($this->keys['channel']);
            }
        } else {
            $channel = strtolower($channel);
            if (!isset($this->channelVariables[$channel])) {
                return null;
            }
            return $this->channelVariables[$channel];
        }
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct();
        $this->channelVariables = array('default' => array());
        $this->rawContent = $rawContent;
        $lines = explode(Message::EOL, $rawContent);
        foreach ($lines as $line) {
            $content = explode(':', $line);
            $name = strtolower(trim($content[0]));
            unset($content[0]);
            $value = isset($content[1]) ? trim(implode(':', $content)) : '';
            if (!strncmp($name, 'chanvariable', 12)) {
                // https://github.com/marcelog/PAMI/issues/85
                $matches = preg_match("/\(([^\)]*)\)/", $name, $captures);
                $chanName = 'default';
                if ($matches > 0) {
                    $chanName = $captures[1];
                }
                $content = explode('=', $value);
                $name = strtolower(trim($content[0]));
                unset($content[0]);
                $value = isset($content[1]) ? trim(implode(':', $content)) : '';
                $this->channelVariables[$chanName][$name] = $value;
            } else {
                $this->setKey($name, $value);
            }
        }
        // https://github.com/marcelog/PAMI/issues/85
        if (isset($this->keys['channel'])) {
            $channel = strtolower($this->keys['channel']);
            if (isset($this->channelVariables[$channel])) {
                $this->channelVariables[$channel] = array_merge(
                    $this->channelVariables[$channel],
                    $this->channelVariables['default']
                );
            } else {
                $this->channelVariables[$channel] = $this->channelVariables['default'];
            }
            unset($this->channelVariables['default']);
        }
    }
}

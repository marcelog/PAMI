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
     * Constructor.
     *
     * @param string $rawContent Original message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct();
        $this->rawContent = $rawContent;
        $lines = explode(Message::EOL, $rawContent);
        foreach ($lines as $line) {
            $content = explode(':', $line);
            $name = strtolower(trim($content[0]));
            unset($content[0]);
            $value = isset($content[1]) ? trim(implode(':', $content)) : '';
            $this->setKey($name, $value);
        }
    }
}

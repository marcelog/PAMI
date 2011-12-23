<?php
/**
 * Event triggered when the Async AGI is called
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Jacob Kiers <jacob@alphacomm.nl>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
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
 * Event triggered when an agi executes an application.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     @author     Jacob Kiers <jacob@alphacomm.nl>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class AsyncAGIEvent extends EventMessage
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
     * Returns key: 'SubEvent'.
     *
     * @return string
     */
    public function getSubEvent()
    {
        return $this->getKey('SubEvent');
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

    public function serialize()
    {
        $result = array();
        foreach($this->getKeys() as $k => $v) {
            if ('agi' == substr(strtolower($k), 0, 3)) {
                continue;
            }
            $result[] = $k . ': ' . $v;
        }
        foreach($this->getVariables() as $k => $v) {
            $result[] = 'Variable: ' . $k . '=' . $v;
        }
        $mStr = $this->finishMessage(implode(self::EOL, $result));
        return $mStr;
    }

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
        if ('' != $this->getKey('Env')) {
            $env = urldecode($this->getKey('Env'));
            $agi_vars = explode(self::EOL, $env);
            foreach($agi_vars as $var) {
                $content = explode(':', $var);
                $name = strtolower(trim($content[0]));
                if ('' == $name) {
                    continue;
                }
                unset($content[0]);
                $value = isset($content[1]) ? trim(implode(':', $content)) : '';
                $this->setKey($name, $value);
            }
        }
    }

}

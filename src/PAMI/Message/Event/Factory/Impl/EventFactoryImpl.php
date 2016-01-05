<?php
/**
 * This factory knows which event to return according to a given raw message
 * from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Event
 * @subpackage Factory.Impl
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
namespace PAMI\Message\Event\Factory\Impl;

use PAMI\Message\Event\EventMessage;
use PAMI\Message\Event\UnknownEvent;
use PAMI\Message\Message;

/**
 * This factory knows which event to return according to a given raw message
 * from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Event
 * @subpackage Factory.Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class EventFactoryImpl
{
    /**
     * This is our factory method.
     *
     * @param string $message Literall message as received from ami.
     *
     * @return EventMessage
     */
    public static function createFromRaw($message)
    {
        $eventStart = strpos($message, 'Event: ') + 7;
/*
        if ($eventStart > strlen($message)) {
            return new UnknownEvent($message);
        }
*/
        $eventEnd = strpos($message, Message::EOL, $eventStart);
        if ($eventEnd === false) {
            $eventEnd = strlen($message);
        }
        $name = substr($message, $eventStart, $eventEnd - $eventStart);
        $className = '\\PAMI\\Message\\Event\\' . $name . 'Event';
        if (class_exists($className, true)) {
            return new $className($message);
        }
	    return new UnknownEvent($message);
    }

    /**
     * Constructor. Nothing to see here, move along.
     *
     * @return void
     */
    public function __construct()
    {
    }
}

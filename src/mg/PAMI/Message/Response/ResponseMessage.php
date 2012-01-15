<?php
/**
 * A generic response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
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
namespace PAMI\Message\Response;

use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Event\EventMessage;

/**
 * A generic response message from ami.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Response
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ResponseMessage extends IncomingMessage
{
    /**
     * Child events.
     * @var EventMessage[]
     */
    private $_events;

    /**
     * Is this response completed? (with all its events).
     * @var boolean
     */
    private $_completed;

    /**
     * Serialize function.
     *
     * @return string[]
     */
    public function __sleep()
    {
        $ret = parent::__sleep();
        $ret[] = '_completed';
        $ret[] = '_events';
        return $ret;
    }

    /**
     * True if this response is complete. A response is considered complete
     * if it's not a list OR it's a list with its last child event containing
     * an EventList = Complete.
     *
     * @return boolean
     */
    public function isComplete()
    {
        return $this->_completed;
    }

    /**
     * Adds an event to this response.
     *
     * @param EventMessage $event Child event to add.
     *
     * @return void
     */
    public function addEvent(EventMessage $event)
    {
        $this->_events[] = $event;
        if (
            stristr($event->getEventList(), 'complete') !== false
            || stristr($event->getName(), 'complete') !== false
            || stristr($event->getName(), 'DBGetResponse') !== false
        ) {
            $this->_completed = true;
        }
    }

    /**
     * Returns all associated events for this response.
     *
     * @return EventMessage[]
     */
    public function getEvents()
    {
        return $this->_events;
    }

    /**
     * Checks if the Response field has the word Error in it.
     *
     * @return boolean
     */
    public function isSuccess()
    {
        return stristr($this->getKey('Response'), 'Error') === false;
    }

    /**
     * Returns true if this response contains the key EventList with the
     * word 'start' in it. Another way is to have a Message key, like:
     * Message: Result will follow
     *
     * @return boolean
     */
    public function isList()
    {
        return
            stristr($this->getKey('EventList'), 'start') !== false
            || stristr($this->getMessage(), 'follow') !== false
        ;
    }

    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->getKey('Message');
    }

    /**
     * Sets an action id. This should not be necessary, but asterisk sometimes
     * decides to not send the Response: or Event: headers.
     *
     * @param string $actionId New ActionId.
     *
     * @return void
     */
    public function setActionId($actionId)
    {
        $this->setKey('ActionId', $actionId);
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
        $this->_events = array();
        $this->_eventsCount = 0;
        $this->_completed = !$this->isList();
    }
}
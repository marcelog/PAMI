<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Response;

use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Event\EventMessage;

/**
 * A generic response message from ami.
 */
class ResponseMessage extends IncomingMessage
{
    /**
     * Child events.
     *
     * @var array
     */
    private $events;

    /**
     * Is this response completed? (with all its events).
     *
     * @var Boolean
     */
    private $completed;

    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami
     */
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);

        $this->_events = array();
        $this->_eventsCount = 0;
        $this->_completed = !$this->isList();
    }

    /**
     * Serialize function.
     *
     * @return array
     */
    public function __sleep()
    {
        $result = parent::__sleep();
        $result[] = '_completed';
        $result[] = '_events';

        return $result;
    }

    /**
     * True if this response is complete. A response is considered complete
     * if it's not a list OR it's a list with its last child event containing
     * an EventList = Complete.
     *
     * @return Boolean
     */
    public function isComplete()
    {
        return $this->_completed;
    }

    /**
     * Adds an event to this response.
     *
     * @param EventMessage $event Child event to add
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
     * @return array
     */
    public function getEvents()
    {
        return $this->_events;
    }

    /**
     * Checks if the Response field has the word Error in it.
     *
     * @return Boolean
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
     * @return Boolean
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
     * @param string $actionId New ActionId
     */
    public function setActionId($actionId)
    {
        $this->setKey('ActionId', $actionId);
    }
}

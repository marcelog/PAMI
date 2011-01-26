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
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
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
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class ResponseMessage extends IncomingMessage
{
    /**
     * Child events.
     * @var EventMessage[]
     */
    private $_events;

    /**
     * The count for the events.
     * @var integer
     */
    private $_eventsCount;

    /**
     * True if this response is complete. A response is considered complete
     * if it's not a list OR it's a list with its last child event containing
     * an EventList = Complete.
     *
     * @return boolean
     */
    public function isComplete()
    {
        if (!$this->isList()) {
            return true;
        }
        $total = $this->_eventsCount - 1;
        if ($total < 0) {
            return false;
        }
        $event = $this->_events[$total];
        foreach ($this->_events as $event) {
            if (stristr($event->getEventList(), 'complete') !== false) {
                return true;
            }
        }
        return false;
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
        $index = $this->_eventsCount;
        $this->_events[$this->_eventsCount] = $event;
        $this->_eventsCount++;
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
     * word 'start' in it.
     *
     * @return boolean
     */
    public function isList()
    {
        return stristr($this->getKey('EventList'), 'start') !== false;
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
    }
}
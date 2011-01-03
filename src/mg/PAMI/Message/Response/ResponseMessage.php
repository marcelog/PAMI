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
        $total = count($this->_events) - 1;
        if ($total < 0) {
            return false;
        }
        $event = $this->_events[$total];
        return stristr($event->getEventlist(), 'complete') !== false; 
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
    }
}
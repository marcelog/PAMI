<?php
/**
 * This factory knows which event to return according to a given raw message
 * from ami.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Event
 * @subpackage Factory.Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace AMI\Message\Event\Factory\Impl;

use AMI\Message\Event\EventMessage;
use AMI\Message\Event\UnknownEvent;
use AMI\Message\Message;

/**
 * This factory knows which event to return according to a given raw message
 * from ami.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Event
 * @subpackage Factory.Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
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
        $eventEnd = strpos($message, Message::EOL, $eventStart);
        $name = substr($message, $eventStart, $eventEnd - $eventStart);
        $className = '\\AMI\\Message\\Event\\' . $name . 'Event';
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
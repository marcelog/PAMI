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
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
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
        if ($eventStart > strlen($message)) {
            return new UnknownEvent($message);
        }
        $eventEnd = strpos($message, Message::EOL, $eventStart);
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

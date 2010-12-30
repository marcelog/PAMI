<?php
namespace AMI\Message\Event\Factory\Impl;

use AMI\Message\Event\NewChannelEvent;
use AMI\Message\Event\EventMessage;
use AMI\Message\Message;

class EventFactoryImpl
{
    public static function createFromRaw($message)
    {
        $eventStart = strpos($message, 'Event: ') + 7;
        $eventEnd = strpos($message, Message::EOL, $eventStart);
        $name = substr($message, $eventStart, $eventEnd - $eventStart);
        switch ($name)
        {
        case 'Newchannel':
            $event = new NewChannelEvent($message);
            break;
        default:
            $event = new EventMessage($message);
            break;
        }
        return $event;
    }
    
    public function __construct()
    {
    }
}
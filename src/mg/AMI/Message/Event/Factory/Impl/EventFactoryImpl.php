<?php
namespace AMI\Message\Event\Factory\Impl;

use AMI\Message\Event\EventMessage;

class EventFactoryImpl
{
    public static function createFromRaw($message)
    {
        return new EventMessage($message);
    }
    
    public function __construct()
    {
    }
}
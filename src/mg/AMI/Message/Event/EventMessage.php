<?php

namespace AMI\Message\Event;

use AMI\Message\IncomingMessage;

class EventMessage extends IncomingMessage
{
    public function getActionID()
    {
        return $this->getVariable('ActionID');
    }
    
    public function getName()
    {
        return $this->getKey('Event');
    }
    
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}

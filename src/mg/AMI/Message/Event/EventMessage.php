<?php

namespace AMI\Message\Event;

use AMI\Message\IncomingMessage;

abstract class EventMessage extends IncomingMessage
{
    public function getActionID()
    {
        return $this->getVariable('ActionID');
    }
    
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}

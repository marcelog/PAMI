<?php

namespace PAMI\Message\Response;

use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;

class ResponseMessage extends IncomingMessage
{
    public function getActionID()
    {
        return $this->getVariable('ActionID');
    }
    
    public function isSuccess()
    {
        return strstr($this->getKey('Response'), 'Error') === false;
    }
    
    public function getMessage()
    {
        return $this->getKey('Message');
    }
    
    public function __construct($rawContent)
    {
        parent::__construct($rawContent);
    }
}
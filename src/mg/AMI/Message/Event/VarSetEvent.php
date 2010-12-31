<?php
namespace AMI\Message\Event;

use AMI\Message\Event\EventMessage;

class VarSetEvent extends EventMessage
{
    /**
     * Returns key: 'Privilege'.
     *
     * @return string
     */
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }
    
    /**
     * Returns key: 'Channel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }
    
    /**
     * Returns key: 'Variable'.
     *
     * @return string
     */
    public function getVariable()
    {
        return $this->getKey('Variable');
    }
    
    /**
     * Returns key: 'Value'.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->getKey('Value');
    }

    /**
     * Returns key: 'UniqueID'.
     *
     * @return string
     */
    public function getUniqueID()
    {
        return $this->getKey('UniqueID');
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
    }
}
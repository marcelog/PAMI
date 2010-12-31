<?php
namespace AMI\Message\Event;

use AMI\Message\Event\EventMessage;

class AGIExecEvent extends EventMessage
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
     * Returns key: 'SubEvent'.
     *
     * @return string
     */
    public function getSubEvent()
    {
        return $this->getKey('SubEvent');
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
     * Returns key: 'CommandId'.
     *
     * @return string
     */
    public function getCommandId()
    {
        return $this->getKey('CommandId');
    }

    /**
     * Returns key: 'Command'.
     *
     * @return string
     */
    public function getCommand()
    {
        return $this->getKey('Command');
    }

    /**
     * Returns key: 'Result'.
     *
     * @return string
     */
    public function getResult()
    {
        return $this->getKey('Result');
    }

    /**
     * Returns key: 'ResultCode'.
     *
     * @return string
     */
    public function getResultCode()
    {
        return $this->getKey('ResultCode');
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
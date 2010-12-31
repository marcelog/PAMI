<?php
namespace AMI\Message\Event;

use AMI\Message\Event\EventMessage;

class BridgeEvent extends EventMessage
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
     * Returns key: 'Bridgestate'.
     *
     * @return string
     */
    public function getBridgeState()
    {
        return $this->getKey('Bridgestate');
    }

    /**
     * Returns key: 'Bridgetype'.
     *
     * @return string
     */
    public function getBridgeType()
    {
        return $this->getKey('Bridgetype');
    }
    
    /**
     * Returns key: 'Channel1'.
     *
     * @return string
     */
    public function getChannel1()
    {
        return $this->getKey('Channel1');
    }

    /**
     * Returns key: 'Channel2'.
     *
     * @return string
     */
    public function getChannel2()
    {
        return $this->getKey('Channel2');
    }
    
    /**
     * Returns key: 'CallerID1'.
     *
     * @return string
     */
    public function getCallerID1()
    {
        return $this->getKey('CallerID1');
    }

    /**
     * Returns key: 'CallerID2'.
     *
     * @return string
     */
    public function getCallerID2()
    {
        return $this->getKey('CallerID2');
    }
    
    /**
     * Returns key: 'UniqueID1'.
     *
     * @return string
     */
    public function getUniqueID1()
    {
        return $this->getKey('UniqueID1');
    }

    /**
     * Returns key: 'UniqueID2'.
     *
     * @return string
     */
    public function getUniqueID2()
    {
        return $this->getKey('UniqueID2');
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
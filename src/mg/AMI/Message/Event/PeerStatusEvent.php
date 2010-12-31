<?php
namespace AMI\Message\Event;

use AMI\Message\Event\EventMessage;

class PeerStatusEvent extends EventMessage
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
     * Returns key: 'ChannelType'.
     *
     * @return string
     */
    public function getChannelType()
    {
        return $this->getKey('ChannelType');
    }
    
    /**
     * Returns key: 'Peer'.
     *
     * @return string
     */
    public function getPeer()
    {
        return $this->getKey('Peer');
    }

    /**
     * Returns key: 'PeerStatus'.
     *
     * @return string
     */
    public function getPeerStatus()
    {
        return $this->getKey('PeerStatus');
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
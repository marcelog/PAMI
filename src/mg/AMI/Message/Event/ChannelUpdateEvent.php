<?php
/**
 * Event triggered when a channel updated its status.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace AMI\Message\Event;

use AMI\Message\Event\EventMessage;

/**
 * Event triggered when a channel updated its status.
 *
 * PHP Version 5
 *
 * @category   Ami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class ChannelUpdateEvent extends EventMessage
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
     * Returns key: 'ChannelType'.
     *
     * @return string
     */
    public function getChannelType()
    {
        return $this->getKey('ChannelType');
    }
    
    /**
     * Returns key: 'SIPcallid'.
     *
     * @return string
     */
    public function getSIPCallID()
    {
        return $this->getKey('SIPcallid');
    }

    /**
     * Returns key: 'SIPfullcontact'.
     *
     * @return string
     */
    public function getSIPFullContact()
    {
        return $this->getKey('SIPfullcontact');
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
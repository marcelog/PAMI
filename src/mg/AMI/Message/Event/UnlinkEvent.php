<?php
/**
 * Event triggered when a bridged channel is unlinked.
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
 * Event triggered when a bridged channel is unlinked.
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
class UnlinkEvent extends EventMessage
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
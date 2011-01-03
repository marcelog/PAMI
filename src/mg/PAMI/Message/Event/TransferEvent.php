<?php
/**
 * Event triggered when a call is transfered.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://www.noneyet.ar/
 */
namespace PAMI\Message\Event;

use PAMI\Message\Event\EventMessage;

/**
 * Event triggered when a call is transfered.
 *
 * PHP Version 5
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @license    http://www.noneyet.ar/ Apache License 2.0
 * @link       http://www.noneyet.ar/
 */
class TransferEvent extends EventMessage
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
     * Returns key: 'TransferMethod'.
     *
     * @return string
     */
    public function getTransferMethod()
    {
        return $this->getKey('TransferMethod');
    }

    /**
     * Returns key: 'TransferType'.
     *
     * @return string
     */
    public function getTransferType()
    {
        return $this->getKey('TransferType');
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
     * Returns key: 'TargetChannel'.
     *
     * @return string
     */
    public function getTargetChannel()
    {
        return $this->getKey('TargetChannel');
    }

    /**
     * Returns key: 'SIP-Callid'.
     *
     * @return string
     */
    public function getSipCallID()
    {
        return $this->getKey('SIP-Callid');
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
     * Returns key: 'TargetUniqueID'.
     *
     * @return string
     */
    public function getTargetUniqueID()
    {
        return $this->getKey('TargetUniqueid');
    }
    
    /**
     * Returns key: 'TransferExten'.
     *
     * @return string
     */
    public function getTransferExten()
    {
        return $this->getKey('TransferExten');
    }
    
    /**
     * Returns key: 'TransferContext'.
     *
     * @return string
     */
    public function getTransferContext()
    {
        return $this->getKey('TransferContext');
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
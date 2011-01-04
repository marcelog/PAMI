<?php
/**
 * Event triggered when an action DAHDIShowChannel is issued.
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
 * Event triggered when an action DAHDIShowChannel is issued.
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
class DAHDIShowChannelsEvent extends EventMessage
{
    /**
     * Returns key: 'DAHDIChannel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }
    
    /**
     * Returns key: 'Signalling'.
     *
     * @return string
     */
    public function getSignalling()
    {
        return $this->getKey('Signalling');
    }

    /**
     * Returns key: 'SignallingCode'.
     *
     * @return string
     */
    public function getSignallingCode()
    {
        return $this->getKey('SignallingCode');
    }
    
    /**
     * Returns key: 'Context'.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->getKey('Context');
    }


    /**
     * Returns key: 'DND'.
     *
     * @return string
     */
    public function getDND()
    {
        return $this->getKey('DND');
    }

    /**
     * Returns key: 'Alarm'.
     *
     * @return string
     */
    public function getAlarm()
    {
        return $this->getKey('Alarm');
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
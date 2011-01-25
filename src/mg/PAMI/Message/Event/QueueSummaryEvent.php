<?php
/**
 * Event triggered for a QueueSummary action.
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
 * Event triggered for a QueueSummary action.
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
class QueueSummaryEvent extends EventMessage
{
    /**
     * Returns key: 'Queue'.
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->getKey('Queue');
    }

    /**
     * Returns key: 'LoggedIn'.
     *
     * @return string
     */
    public function getLoggedIn()
    {
        return $this->getKey('LoggedIn');
    }

    /**
     * Returns key: 'Available'.
     *
     * @return string
     */
    public function getAvailable()
    {
        return $this->getKey('Available');
    }

    /**
     * Returns key: 'Callers'.
     *
     * @return string
     */
    public function getCallers()
    {
        return $this->getKey('Callers');
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return integer
     */
    public function getHoldTime()
    {
        return $this->getKey('HoldTime');
    }

    /**
     * Returns key: 'LongestHoldTime'.
     *
     * @return integer
     */
    public function getLongestHoldTime()
    {
        return $this->getKey('LongestHoldTime');
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
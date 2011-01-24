<?php
/**
 * Event triggered for a QueueStatus action.
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
 * Event triggered for a QueueStatus action.
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
class QueueParamsEvent extends EventMessage
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
     * Returns key: 'Max'.
     *
     * @return integer
     */
    public function getMax()
    {
        return intval($this->getKey('Max'));
    }

    /**
     * Returns key: 'Strategy'.
     *
     * @return string
     */
    public function getStrategy()
    {
        return $this->getKey('Strategy');
    }

    /**
     * Returns key: 'Calls'.
     *
     * @return integer
     */
    public function getCalls()
    {
        return intval($this->getKey('Calls'));
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return integer
     */
    public function getHoldTime()
    {
        return intval($this->getKey('HoldTime'));
    }

    /**
     * Returns key: 'Completed'.
     *
     * @return integer
     */
    public function getCompleted()
    {
        return intval($this->getKey('Completed'));
    }

    /**
     * Returns key: 'Abandoned'.
     *
     * @return integer
     */
    public function getAbandoned()
    {
        return intval($this->getKey('Abandoned'));
    }

    /**
     * Returns key: 'ServiceLevel'.
     *
     * @return integer
     */
    public function getServiceLevel()
    {
        return intval($this->getKey('ServiceLevel'));
    }

    /**
     * Returns key: 'ServiceLevelPerf'.
     *
     * @return float
     */
    public function getServiceLevelPerf()
    {
        return $this->getKey('ServiceLevelPerf');
    }

    /**
     * Returns key: 'Weight'.
     *
     * @return integer
     */
    public function getWeight()
    {
        return intval($this->getKey('Weight'));
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
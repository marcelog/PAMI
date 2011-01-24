<?php
/**
 * Event triggered for a status change in a queue.
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
 * Event triggered for a status change in a queue.
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
class QueueMemberStatusEvent extends EventMessage
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
     * Returns key: 'Queue'.
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->getKey('Queue');
    }

    /**
     * Returns key: 'Location'.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->getKey('Location');
    }

    /**
     * Returns key: 'MemberName'.
     *
     * @return string
     */
    public function getMemberName()
    {
        return $this->getKey('MemberName');
    }

    /**
     * Returns key: 'Membership'.
     *
     * @return string
     */
    public function getMembership()
    {
        return $this->getKey('Membership');
    }

    /**
     * Returns key: 'Penalty'.
     *
     * @return integer
     */
    public function getPenalty()
    {
        return $this->getKey('Penalty');
    }

    /**
     * Returns key: 'CallsTaken'.
     *
     * @return integer
     */
    public function getCallsTaken()
    {
        return $this->getKey('CallsTaken');
    }

    /**
     * Returns key: 'Status'.
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'Pause'.
     *
     * @return boolean
     */
    public function getPause()
    {
        return intval($this->getKey('Pause')) != 0;
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
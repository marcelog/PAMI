<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Event;

/**
 * Event triggered for a QueueMemberAdd action.
 */
class QueueMemberAddedEvent extends EventMessage
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
     * Returns key: 'LastCall'.
     *
     * @return integer
     */
    public function getLastCall()
    {
        return $this->getKey('LastCall');
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
     * @return Boolean
     */
    public function getPaused()
    {
        return intval($this->getKey('Paused')) != 0;
    }
}

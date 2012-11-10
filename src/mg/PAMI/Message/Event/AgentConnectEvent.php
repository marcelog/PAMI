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
 * Event triggered when an agent connects.
 */
class AgentConnectEvent extends EventMessage
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
     * Returns key: 'HoldTime'.
     *
     * @return string
     */
    public function getHoldTime()
    {
        return $this->getKey('HoldTime');
    }

    /**
     * Returns key: 'BridgedChannel'.
     *
     * @return string
     */
    public function getBridgedChannel()
    {
        return $this->getKey('BridgedChannel');
    }

    /**
     * Returns key: 'RingTime'.
     *
     * @return string
     */
    public function getRingTime()
    {
        return $this->getKey('RingTime');
    }

    /**
     * Returns key: 'Member'.
     *
     * @return string
     */
    public function getMember()
    {
        return $this->getKey('Member');
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
     * Returns key: 'Queue'.
     *
     * @return string
     */
    public function getQueue()
    {
        return $this->getKey('Queue');
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
     * Returns key: 'Channel'.
     *
     * @return string
     */
    public function getChannel()
    {
        return $this->getKey('Channel');
    }
}

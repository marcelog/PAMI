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
 * Event triggered when joining a channel.
 */
class JoinEvent extends EventMessage
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
     * Returns key: 'Count'.
     *
     * @return string
     */
    public function getCount()
    {
        return $this->getKey('Count');
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
     * Returns key: 'Position'.
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->getKey('Position');
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
     * Returns key: 'CallerIdNum'.
     *
     * @return string
     */
    public function getCallerIdNum()
    {
        return $this->getKey('CallerIdNum');
    }

    /**
     * Returns key: 'CallerIdName'.
     *
     * @return string
     */
    public function getCallerIdName()
    {
        return $this->getKey('CallerIdName');
    }
}

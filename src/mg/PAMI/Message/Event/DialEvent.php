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
 * Event triggered when a dial is executed.
 */
class DialEvent extends EventMessage
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
     * Returns key: 'SubEvent'.
     *
     * @return string
     */
    public function getSubEvent()
    {
        return $this->getKey('SubEvent');
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
     * Returns key: 'Destination'.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->getKey('Destination');
    }

    /**
     * Returns key: 'CallerIDNum'.
     *
     * @return string
     */
    public function getCallerIDNum()
    {
        return $this->getKey('CallerIDNum');
    }

    /**
     * Returns key: 'CallerIDName'.
     *
     * @return string
     */
    public function getCallerIDName()
    {
        return $this->getKey('CallerIDName');
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
     * Returns key: 'DestUniqueID'.
     *
     * @return string
     */
    public function getDestUniqueID()
    {
        return $this->getKey('DestUniqueID');
    }

    /**
     * Returns key: 'DialString'.
     *
     * @return string
     */
    public function getDialString()
    {
        return $this->getKey('DialString');
    }

    /**
     * Returns key: 'DialStatus'.
     *
     * @return string
     */
    public function getDialStatus()
    {
        return $this->getKey('DialStatus');
    }
}

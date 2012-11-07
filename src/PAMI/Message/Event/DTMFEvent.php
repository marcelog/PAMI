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
 * Event triggered when a dtmf is detected in a call.
 */
class DTMFEvent extends EventMessage
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
     * Returns key: 'Digit'.
     *
     * @return string
     */
    public function getDigit()
    {
        return $this->getKey('Digit');
    }

    /**
     * Returns key: 'Direction'.
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->getKey('Direction');
    }

    /**
     * Returns key: 'End'.
     *
     * @return string
     */
    public function getEnd()
    {
        return $this->getKey('End');
    }

    /**
     * Returns key: 'Begin'.
     *
     * @return string
     */
    public function getBegin()
    {
        return $this->getKey('Begin');
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
}

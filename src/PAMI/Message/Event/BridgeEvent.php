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
 * Event triggered when bridging (connecting) two channels.
 */
class BridgeEvent extends EventMessage
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
     * Returns key: 'Bridgestate'.
     *
     * @return string
     */
    public function getBridgeState()
    {
        return $this->getKey('Bridgestate');
    }

    /**
     * Returns key: 'Bridgetype'.
     *
     * @return string
     */
    public function getBridgeType()
    {
        return $this->getKey('Bridgetype');
    }

    /**
     * Returns key: 'Channel1'.
     *
     * @return string
     */
    public function getChannel1()
    {
        return $this->getKey('Channel1');
    }

    /**
     * Returns key: 'Channel2'.
     *
     * @return string
     */
    public function getChannel2()
    {
        return $this->getKey('Channel2');
    }

    /**
     * Returns key: 'CallerID1'.
     *
     * @return string
     */
    public function getCallerID1()
    {
        return $this->getKey('CallerID1');
    }

    /**
     * Returns key: 'CallerID2'.
     *
     * @return string
     */
    public function getCallerID2()
    {
        return $this->getKey('CallerID2');
    }

    /**
     * Returns key: 'UniqueID1'.
     *
     * @return string
     */
    public function getUniqueID1()
    {
        return $this->getKey('UniqueID1');
    }

    /**
     * Returns key: 'UniqueID2'.
     *
     * @return string
     */
    public function getUniqueID2()
    {
        return $this->getKey('UniqueID2');
    }
}

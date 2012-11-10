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
 * Event triggered when exchanging rtp stats.
 */
class RTPReceiverStatEvent extends EventMessage
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
     * Returns key: 'SSRC'.
     *
     * @return string
     */
    public function getSSRC()
    {
        return $this->getKey('SSRC');
    }

    /**
     * Returns key: 'ReceivedPackets'.
     *
     * @return string
     */
    public function getReceivedPackets()
    {
        return $this->getKey('ReceivedPackets');
    }

    /**
     * Returns key: 'LostPackets'.
     *
     * @return string
     */
    public function getLostPackets()
    {
        return $this->getKey('LostPackets');
    }

    /**
     * Returns key: 'Jitter'.
     *
     * @return string
     */
    public function getJitter()
    {
        return $this->getKey('Jitter');
    }

    /**
     * Returns key: 'Transit'.
     *
     * @return string
     */
    public function getTransit()
    {
        return $this->getKey('Transit');
    }

    /**
     * Returns key: 'RRCount'.
     *
     * @return string
     */
    public function getRRCount()
    {
        return $this->getKey('RRCount');
    }
}

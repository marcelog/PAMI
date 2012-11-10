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
class RTCPReceivedEvent extends EventMessage
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
     * Returns key: 'From'.
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->getKey('From');
    }

    /**
     * Returns key: 'PT'.
     *
     * @return string
     */
    public function getPT()
    {
        return $this->getKey('PT');
    }

    /**
     * Returns key: 'ReceptionReports'.
     *
     * @return string
     */
    public function getReceptionReports()
    {
        return $this->getKey('ReceptionReports');
    }

    /**
     * Returns key: 'SenderSSRC'.
     *
     * @return string
     */
    public function getSenderSSRC()
    {
        return $this->getKey('SenderSSRC');
    }

    /**
     * Returns key: 'FractionLost'.
     *
     * @return string
     */
    public function getFractionLost()
    {
        return $this->getKey('FractionLost');
    }

    /**
     * Returns key: 'PacketsLost'.
     *
     * @return string
     */
    public function getPacketsLost()
    {
        return $this->getKey('PacketsLost');
    }

    /**
     * Returns key: 'HighestSequence'.
     *
     * @return string
     */
    public function getHighestSequence()
    {
        return $this->getKey('HighestSequence');
    }
    /**
     * Returns key: 'SequenceNumberCycles'.
     *
     * @return string
     */
    public function getSequenceNumberCycles()
    {
        return $this->getKey('SequenceNumberCycles');
    }
    /**
     * Returns key: 'IAJitter'.
     *
     * @return string
     */
    public function getIAJitter()
    {
        return $this->getKey('IAJitter');
    }
    /**
     * Returns key: 'LastSR'.
     *
     * @return string
     */
    public function getLastSR()
    {
        return $this->getKey('LastSR');
    }
    /**
     * Returns key: 'DLSR'.
     *
     * @return string
     */
    public function getDLSR()
    {
        return $this->getKey('DLSR');
    }
    /**
     * Returns key: 'RTT'.
     *
     * @return string
     */
    public function getRTT()
    {
        return $this->getKey('RTT');
    }
}

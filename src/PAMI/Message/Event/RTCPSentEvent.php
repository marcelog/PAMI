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
class RTCPSentEvent extends EventMessage
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
     * Returns key: 'To'.
     *
     * @return string
     */
    public function getTo()
    {
        return $this->getKey('To');
    }

    /**
     * Returns key: 'OurSSRC'.
     *
     * @return string
     */
    public function getOurSSRC()
    {
        return $this->getKey('OurSSRC');
    }

    /**
     * Returns key: 'SentNTP'.
     *
     * @return string
     */
    public function getSentNTP()
    {
        return $this->getKey('SentNTP');
    }

    /**
     * Returns key: 'SentRTP'.
     *
     * @return string
     */
    public function getSentRTP()
    {
        return $this->getKey('SentRTP');
    }

    /**
     * Returns key: 'SentPackets'.
     *
     * @return string
     */
    public function getSentPackets()
    {
        return $this->getKey('SentPackets');
    }

    /**
     * Returns key: 'SentOctets'.
     *
     * @return string
     */
    public function getSentOctets()
    {
        return $this->getKey('SentOctets');
    }

    /**
     * Returns key: 'ReportBlock'.
     *
     * @return string
     */
    public function getReportBlock()
    {
        return $this->getKey('ReportBlock');
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
     * Returns key: 'CumulativeLoss'.
     *
     * @return string
     */
    public function getCumulativeLoss()
    {
        return $this->getKey('CumulativeLoss');
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
     * Returns key: 'TheirLastSR'.
     *
     * @return string
     */
    public function getTheirLastSR()
    {
        return $this->getKey('TheirLastSR');
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
}

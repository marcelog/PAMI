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
 * Event triggered for each peer when an action Sippeers is issued.
 */
class PeerEntryEvent extends EventMessage
{
    /**
     * Returns key: 'ChannelType'.
     *
     * @return string
     */
    public function getChannelType()
    {
        return $this->getKey('ChannelType');
    }

    /**
     * Returns key: 'ObjectName'.
     *
     * @return string
     */
    public function getObjectName()
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Returns key: 'ChanObjectType'.
     *
     * @return string
     */
    public function getChannelObjectType()
    {
        return $this->getKey('ChanObjectType');
    }

    /**
     * Returns key: 'IPAddress'.
     *
     * @return string
     */
    public function getIPAddress()
    {
        return $this->getKey('IPAddress');
    }

    /**
     * Returns key: 'IPPort'.
     *
     * @return string
     */
    public function getIPPort()
    {
        return $this->getKey('IPPort');
    }

    /**
     * Returns key: 'Dynamic'.
     *
     * @return string
     */
    public function getDynamic()
    {
        return $this->getKey('Dynamic');
    }

    /**
     * Returns key: 'NatSupport'.
     *
     * @return string
     */
    public function getNatSupport()
    {
        return $this->getKey('NatSupport');
    }

    /**
     * Returns key: 'VideoSupport'.
     *
     * @return string
     */
    public function getVideoSupport()
    {
        return $this->getKey('VideoSupport');
    }

    /**
     * Returns key: 'TextSupport'.
     *
     * @return string
     */
    public function getTextSupport()
    {
        return $this->getKey('TextSupport');
    }

    /**
     * Returns key: 'ACL'.
     *
     * @return string
     */
    public function getACL()
    {
        return $this->getKey('ACL');
    }

    /**
     * Returns key: 'Status'.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->getKey('Status');
    }

    /**
     * Returns key: 'RealtimeDevice'.
     *
     * @return string
     */
    public function getRealtimeDevice()
    {
        return $this->getKey('RealtimeDevice');
    }
}

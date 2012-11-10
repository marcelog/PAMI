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
 * Event triggered when a peer changes its status.
 */
class PeerStatusEvent extends EventMessage
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
     * Returns key: 'ChannelType'.
     *
     * @return string
     */
    public function getChannelType()
    {
        return $this->getKey('ChannelType');
    }

    /**
     * Returns key: 'Peer'.
     *
     * @return string
     */
    public function getPeer()
    {
        return $this->getKey('Peer');
    }

    /**
     * Returns key: 'PeerStatus'.
     *
     * @return string
     */
    public function getPeerStatus()
    {
        return $this->getKey('PeerStatus');
    }
}

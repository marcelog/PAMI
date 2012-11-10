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
 * Event Jabber
 */
class JabberEventEvent extends EventMessage
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
     * Returns key: 'Account'.
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->getKey('Account');
    }

    /**
     * Returns key: 'Packet'.
     *
     * @return string
     */
    public function getPacket()
    {
        return $this->getKey('Packet');
    }
}

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
 * Event triggered while waiting for an incoming message.
 */
class MessageWaitingEvent extends EventMessage
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
     * Returns key: 'Mailbox'.
     *
     * @return string
     */
    public function getMailbox()
    {
        return $this->getKey('Mailbox');
    }

    /**
     * Returns key: 'Waiting'.
     *
     * @return string
     */
    public function getWaiting()
    {
        return $this->getKey('Waiting');
    }
}

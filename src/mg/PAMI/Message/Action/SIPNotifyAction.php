<?php

/*
 * This file is part of the PAMI package.
 *
 * (c) Marcelo Gornstein <marcelog@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PAMI\Message\Action;

/**
 * SIPNotify action message.
 */
class SIPNotifyAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Peer to receive the notify
     */
    public function __construct($channel)
    {
        parent::__construct('SIPnotify');

        $this->setKey('Channel', $channel);
    }
}

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
 * SipQualifyPeer action message.
 */
class SIPQualifyPeerAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $peer The peer name you want to qualify
     */
    public function __construct($peer)
    {
        parent::__construct('Sipqualifypeer');

        $this->setKey('Peer', $peer);
    }
}

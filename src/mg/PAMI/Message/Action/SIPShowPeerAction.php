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
 * Sipshowpeer action message.
 */
class SIPShowPeerAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $peer Peer name
     */
    public function __construct($peer)
    {
        parent::__construct('SIPshowpeer');

        $this->setKey('Peer', $peer);
    }
}

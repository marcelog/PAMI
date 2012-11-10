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
 * Bridge action message.
 */
class BridgeAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string  $channel1 Channel1
     * @param string  $channel1 Channel1
     * @param Boolean $tone     Play courtesy tone to Channel2
     */
    public function __construct($channel1, $channel2, $tone = false)
    {
        parent::__construct('Bridge');

        $this->setKey('Channel1', $channel1);
        $this->setKey('Channel2', $channel2);
        $this->setKey('Tone', $tone ? 'true' : 'false');
    }
}

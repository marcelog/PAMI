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
 * Unpauses the Monitor for a given channel.
 */
class UnpauseMonitorAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel monitored to unpause
     */
    public function __construct($channel)
    {
        parent::__construct('UnpauseMonitor');

        $this->setKey('Channel', $channel);
    }
}

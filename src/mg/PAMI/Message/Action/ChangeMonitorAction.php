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
 * Changes the monitor filename.
 */
class ChangeMonitorAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel  Channel to monitor
     * @param string $filename Absolute path to target filename
     */
    public function __construct($channel, $filename)
    {
        parent::__construct('ChangeMonitor');

        $this->setKey('Channel', $channel);
        $this->setKey('File', $filename);
    }
}

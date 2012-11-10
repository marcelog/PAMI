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
 * Monitor action message. Will always record with .wav format and mixing the
 * input and output channels. Also, the filename is mandatory:
 *
 * Mix: true
 * Format: wav
 */
class MonitorAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel  Channel to monitor
     * @param string $filename Absolute path to target filename
     */
    public function __construct($channel, $filename)
    {
        parent::__construct('Monitor');

        $this->setKey('Channel', $channel);
        $this->setKey('Mix', 'true');
        $this->setKey('Format', 'wav');
        $this->setKey('File', $filename);
    }
}

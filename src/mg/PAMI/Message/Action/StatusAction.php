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
 * Queries for the status of a channel or all channels if none specified.
 */
class StatusAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $channel Channel to query (optional)
     */
    public function __construct($channel = false)
    {
        parent::__construct('Status');

        if ($channel !== false) {
            $this->setKey('Channel', $channel);
        }
    }
}

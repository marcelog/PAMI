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
 * QueueReset action message.
 */
class QueueResetAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue Queue name
     */
    public function __construct($queue = false)
    {
        parent::__construct('QueueReset');

        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }
    }
}

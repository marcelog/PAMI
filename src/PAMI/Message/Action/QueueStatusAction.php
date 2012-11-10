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
 * QueueStatus action message.
 */
class QueueStatusAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue The queue (optional)
     */
    public function __construct($queue = false, $member = false)
    {
        parent::__construct('QueueStatus');

        if ($queue != false) {
            $this->setKey('Queue', $queue);
        }

        if ($member != false) {
            $this->setKey('Member', $member);
        }
    }
}

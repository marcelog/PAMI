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
 * QueuePenalty action message.
 */
class QueuePenaltyAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $queue Queue name
     * @param string $event Event
     */
    public function __construct($interface, $penalty, $queue = false)
    {
        parent::__construct('QueuePenalty');

        $this->setKey('Interface', $interface);
        $this->setKey('Penalty', $penalty);

        if ($queue !== false) {
            $this->setKey('Queue', $queue);
        }
    }
}
